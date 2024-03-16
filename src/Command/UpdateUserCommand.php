<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:user:update',
    description: 'Updates an existing user.',
    hidden: false,
    aliases: ['app:update-user']
)]
class UpdateUserCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('id', InputArgument::REQUIRED, 'The ID of the user.')
            ->addOption('email', null, InputOption::VALUE_OPTIONAL, 'The new email of the user.')
            ->addOption('password', null, InputOption::VALUE_OPTIONAL, 'The new password for the user.')
            ->addOption('admin', null, InputOption::VALUE_NONE, 'Flag to set the user as an admin.')
            ->addOption('firstName', null, InputOption::VALUE_OPTIONAL, 'The new first name of the user.')
            ->addOption('lastName', null, InputOption::VALUE_OPTIONAL, 'The new last name of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $userIdOrEmail = $input->getArgument('id');
        $email = $input->getOption('email');
        $password = $input->getOption('password');
        $isAdmin = $input->getOption('admin');
        $firstName = $input->getOption('firstName');
        $lastName = $input->getOption('lastName');

        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->find($userIdOrEmail);

        if (!$user) {
            $user = $userRepository->findOneBy(['email' => $userIdOrEmail]);
        }

        if (!$user) {
            $output->writeln('<error>User not found.</error>');
            return Command::FAILURE;
        }

        if ($email && $user->getEmail() !== $email) {
            $user->setEmail($email);
        }

        if ($password) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $password));
        }

        if ($isAdmin) {
            $user->setRoles(['ROLE_ADMIN']);
        } else {
            $user->setRoles(['ROLE_USER']);
        }

        if ($firstName) {
            $user->setFirstName($firstName);
        }

        if ($lastName) {
            $user->setLastName($lastName);
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $output->writeln('User successfully updated!');

        return Command::SUCCESS;
    }
}
