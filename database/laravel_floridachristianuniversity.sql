-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2019 às 05:19
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_floridachristianuniversity`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_professores`
--

CREATE TABLE `alunos_professores` (
  `id` int(10) UNSIGNED NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `professor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos_professores`
--

INSERT INTO `alunos_professores` (`id`, `aluno_id`, `professor_id`) VALUES
(3, 2, 1),
(4, 2, 10),
(5, 12, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'post alunos', 'post-alunos', NULL, 'Bibliografia alunos', '2019-05-08 01:16:26', '2019-05-08 01:17:19'),
(2, 'Post Professor', 'post professor', NULL, 'bibliografia professor', '2019-05-08 01:17:01', '2019-05-08 01:17:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coments`
--

CREATE TABLE `coments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `coments`
--

INSERT INTO `coments` (`id`, `post_id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'não entendi', 'não entendi', '2019-05-10 02:52:42', '2019-05-10 02:52:42'),
(2, 2, 12, 'edgar criou um comentario', 'edgar criou um comentario', '2019-05-10 03:07:53', '2019-05-10 03:07:53'),
(3, 2, 12, 'edgar criou um comentario', 'edgar criou um comentario', '2019-05-10 03:07:59', '2019-05-10 03:07:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `status` enum('A','R') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'R' COMMENT 'A-> Ativo postado, R -> Rascunho, não mostrar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment_answers`
--

CREATE TABLE `comment_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `name`) VALUES
(1, 'Programação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes`
--

CREATE TABLE `instituicoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `name`) VALUES
(1, 'Florida Christian University');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_04_27_202038_create_users_table', 1),
(3, '2019_04_27_203138_a', 1),
(4, '2019_04_27_203701_create_password_resets_table', 2),
(5, '2019_04_27_203836_create_categories_table', 3),
(6, '2019_04_27_204019_create_posts_table', 4),
(7, '2019_04_27_204552_create_post_views_table', 4),
(8, '2019_04_27_204758_create_comments_table', 5),
(9, '2019_04_27_204858_create_comment_answers_table', 6),
(10, '2019_04_27_204946_create_profiles_table', 7),
(11, '2019_04_27_205039_create_permissions_table', 8),
(12, '2019_04_27_205130_create_instituicoes_table', 9),
(13, '2019_04_27_205212_create_cursos_table', 10),
(14, '2019_04_27_205259_create_requirements_table', 11),
(15, '2019_04_27_205359_create_titulacoes_table', 12),
(16, '2019_04_27_205435_create_requirements_professores_table', 13),
(17, '2019_04_27_205512_create_alunos_professores_table', 14),
(18, '2019_04_27_205612_create_coments_table', 15),
(19, '2019_04_27_205713_create_notifications_table', 16),
(20, '2019_04_27_205813_create_jobs_table', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('085f5799-9781-4196-9d1c-c61d262b27ee', 'App\\Notifications\\PostComentes', 'App\\User', 1, '{\"comment\":{\"post_id\":\"3\",\"title\":\"n\\u00e3o entendi\",\"body\":\"n\\u00e3o entendi\",\"user_id\":1,\"updated_at\":\"2019-05-09 23:52:42\",\"created_at\":\"2019-05-09 23:52:42\",\"id\":1,\"user\":{\"id\":1,\"name\":\"Rafael Luiz Andrade dos Santos\",\"email\":\"rafaluiz777@gmail.com\",\"created_at\":\"2019-04-28 00:00:00\",\"updated_at\":\"2019-04-28 00:00:00\",\"matricula\":\"1827171\",\"datanascimento\":\"1990-05-04\",\"cep\":\"58038381\",\"logradouro\":\"Avenida Sap\\u00e9\",\"numero\":856,\"complemento\":\"Casa\",\"bairro\":\"Manaira\",\"cidade\":\"Jo\\u00e3o Pessoa\",\"uf\":\"PB\",\"naturalidade\":\"Jo\\u00e3o Pessoa\",\"nacionalidade\":\"Brasil\",\"sexo\":\"Masculino\",\"cpf\":\"08774083430\",\"telefone\":\"996831449\",\"teleftwo\":\"83996831449\",\"celular\":\"96831449\",\"tipo\":\"professor\"}}}', NULL, '2019-05-10 02:52:44', '2019-05-10 02:52:44'),
('0f398a63-9194-4aad-bbf2-7bcc8f07dc6f', 'App\\Notifications\\PostComentes', 'App\\User', 12, '{\"comment\":{\"post_id\":\"2\",\"title\":\"edgar criou um comentario\",\"body\":\"edgar criou um comentario\",\"user_id\":12,\"updated_at\":\"2019-05-10 00:07:53\",\"created_at\":\"2019-05-10 00:07:53\",\"id\":2,\"user\":{\"id\":12,\"name\":\"Edgar Pinheiro\",\"email\":\"edgar@gmail.com\",\"created_at\":\"2019-04-28 11:32:19\",\"updated_at\":\"2019-04-28 11:32:19\",\"matricula\":\"7800266\",\"datanascimento\":\"1990-02-05\",\"cep\":\"5820213\",\"logradouro\":\"rua do centro\",\"numero\":123456,\"complemento\":\"casa\",\"bairro\":\"teste de bairro\",\"cidade\":\"centro\",\"uf\":\"pb\",\"naturalidade\":\"centro\",\"nacionalidade\":\"Brasil\",\"sexo\":\"A\",\"cpf\":\"087740834311\",\"telefone\":\"12312312321\",\"teleftwo\":\"123123123123\",\"celular\":\"12312313213\",\"tipo\":\"aluno\"}}}', NULL, '2019-05-10 03:07:55', '2019-05-10 03:07:55'),
('178f91ce-68bf-42fc-9e51-9f26a0284111', 'App\\Notifications\\PostComentes', 'App\\User', 12, '{\"comment\":{\"post_id\":\"2\",\"title\":\"edgar criou um comentario\",\"body\":\"edgar criou um comentario\",\"user_id\":12,\"updated_at\":\"2019-05-10 00:07:59\",\"created_at\":\"2019-05-10 00:07:59\",\"id\":3,\"user\":{\"id\":12,\"name\":\"Edgar Pinheiro\",\"email\":\"edgar@gmail.com\",\"created_at\":\"2019-04-28 11:32:19\",\"updated_at\":\"2019-04-28 11:32:19\",\"matricula\":\"7800266\",\"datanascimento\":\"1990-02-05\",\"cep\":\"5820213\",\"logradouro\":\"rua do centro\",\"numero\":123456,\"complemento\":\"casa\",\"bairro\":\"teste de bairro\",\"cidade\":\"centro\",\"uf\":\"pb\",\"naturalidade\":\"centro\",\"nacionalidade\":\"Brasil\",\"sexo\":\"A\",\"cpf\":\"087740834311\",\"telefone\":\"12312312321\",\"teleftwo\":\"123123123123\",\"celular\":\"12312313213\",\"tipo\":\"aluno\"}}}', NULL, '2019-05-10 03:08:00', '2019-05-10 03:08:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'posts', 'Gestão de Posts', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(2, 'categorias', 'Gestão de Categorias', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(3, 'comments', 'Gestão de Comentários', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(4, 'perfis', 'Gestão de Perfis', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(5, 'permissions', 'Gestão de Permissões', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(6, 'users', 'Gestão de Usuários', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(7, 'alunos', 'Alunos', '2019-05-10 02:39:33', '2019-05-10 02:39:33'),
(8, 'cursos', 'Cursos', '2019-05-10 02:40:12', '2019-05-10 02:40:12'),
(9, 'comments', 'Comments', '2019-05-10 02:40:49', '2019-05-10 02:40:49'),
(10, 'instituicoes', 'Instituições', '2019-05-10 02:41:33', '2019-05-10 02:41:33'),
(11, 'professores', 'Professores', '2019-05-10 02:44:13', '2019-05-10 02:44:13'),
(12, 'tarefas', 'Gestão de Tarefas', '2019-05-10 02:47:32', '2019-05-10 02:47:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_profile`
--

CREATE TABLE `permission_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_profile`
--

INSERT INTO `permission_profile` (`id`, `permission_id`, `profile_id`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 3, 4),
(4, 4, 4),
(5, 5, 4),
(6, 6, 4),
(7, 6, 5),
(8, 7, 1),
(9, 7, 4),
(10, 8, 4),
(11, 9, 4),
(12, 10, 4),
(13, 11, 4),
(14, 12, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('A','R') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A-> Ativo postado, R -> Rascunho, não mostrar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `url`, `image`, `description`, `date`, `hour`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Tarefa Aluno - Thatiane Andrade de Brito', 'tarefa-aluno-thatiane', '201905072219015cd22e85064f8.jpg', 'tarefa criada para Thati', '2019-05-07', '23:03:00', 0, 'A', '2019-05-08 01:19:01', '2019-05-08 01:19:01'),
(2, 12, 1, 'Tarefa Aluno - Edgar Pinheiro', 'tarefa-aluno-edgar', '201905072224305cd22fcec0ccd.jpg', 'Edgar Pinheiro', '2019-05-07', '23:23:00', 0, 'A', '2019-05-08 01:24:30', '2019-05-08 01:24:30'),
(3, 1, 1, 'rafael luiz', 'rafael-luiz', '201905090155445cd3b2d0207d4.jpg', 'adsfadsfdsafadsfadsfadsf', '2019-05-09', '00:00:00', 0, 'A', '2019-05-09 04:55:44', '2019-05-09 04:55:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_views`
--

CREATE TABLE `post_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'Manager label', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(2, 'User', '	\r\nPermissões básicas', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(3, 'Editor', 'Editor do Projeto', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(4, 'Admin', 'Administrador do Sistema\r\n', '2019-03-28 03:00:00', '2019-03-28 03:00:00'),
(5, 'Aluno', 'Gestão do Aluno', '2019-04-28 03:00:00', '2019-04-28 03:00:00'),
(6, 'Professor', 'Gestão do Professor', '2019-04-28 03:00:00', '2019-04-28 03:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile_user`
--

CREATE TABLE `profile_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `profile_user`
--

INSERT INTO `profile_user` (`id`, `profile_id`, `user_id`) VALUES
(1, 4, 1),
(4, 6, 10),
(5, 5, 12),
(6, 4, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requirements`
--

CREATE TABLE `requirements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `instituicoe_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicioprocesso` date NOT NULL,
  `previsaoprojeto` date NOT NULL,
  `previsaofinal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `requirements`
--

INSERT INTO `requirements` (`id`, `user_id`, `curso_id`, `instituicoe_id`, `description`, `inicioprocesso`, `previsaoprojeto`, `previsaofinal`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, 'sadasdasd', '1998-04-04', '1998-12-12', '1923-10-10', NULL, NULL),
(3, 12, 1, 1, 'SDASDAD', '1998-04-04', '1998-12-12', '1923-10-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requirements_professores`
--

CREATE TABLE `requirements_professores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `titulacoe_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduacoes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posgraduacoes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mestrado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doutorado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posdoutorado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `requirements_professores`
--

INSERT INTO `requirements_professores` (`id`, `user_id`, `titulacoe_id`, `description`, `graduacoes`, `posgraduacoes`, `mestrado`, `doutorado`, `posdoutorado`, `created_at`, `updated_at`) VALUES
(2, 10, 1, 'ASDADASDA', 'asdasdad', 'hhghaada', 'bbffaaa', 'asdgfea', 'ngdsdfafa', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulacoes`
--

CREATE TABLE `titulacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `titulacoes`
--

INSERT INTO `titulacoes` (`id`, `name`) VALUES
(1, 'Graduação'),
(2, 'Pos-Graduado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanascimento` date DEFAULT NULL,
  `cep` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logradouro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `complemento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naturalidade` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidade` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teleftwo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('professor','aluno') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `matricula`, `datanascimento`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `naturalidade`, `nacionalidade`, `sexo`, `cpf`, `telefone`, `teleftwo`, `celular`, `tipo`) VALUES
(1, 'Rafael Luiz Andrade dos Santos', 'rafaluiz777@gmail.com', '$2y$10$jIa9RRg154D9XZIMSiz/duwEEPCrbh6mn8sl1TmoOOOPBXwBfDBL2', 'f6a8lFhfuPLlVtHR324BG9g0gWjSUaMLIoRED0msSikyFWUEsqzxDgZmz7rk', '2019-04-28 03:00:00', '2019-04-28 03:00:00', '1827171', '1990-05-04', '58038381', 'Avenida Sapé', 856, 'Casa', 'Manaira', 'João Pessoa', 'PB', 'João Pessoa', 'Brasil', 'Masculino', '08774083430', '996831449', '83996831449', '96831449', 'professor'),
(2, 'Thatiane Andrade de Brito', 'thati@gmail.com', '$2y$10$61tRuih5d9W/ShbLBd3aF.dXwkPOGMUNUtPiabSR8wDk1w9PDQlrK', 'blB5TEqkt4p1rWDWx6IWwrnDXJP7RUxSB8efm9Jk9bPZ9xx5wjYJpexl9SjD', '2019-04-28 14:08:08', '2019-04-28 14:12:31', '7800266', '1990-02-05', '58038381', 'rua do centro', 123, 'casa', 'manaira', 'João PeSSOA', 'PB', 'B', 'Brasil', 'Recife', '08774083431', '12312312321', '123123123123', '12312313213', 'aluno'),
(10, 'Paulo Rogerio de araujo barbosa', 'paulorogeriojp@gmail.com', '$2y$10$5oW5wEDuVEvgZjZF6buAP.KZjN3Vde1JBt4Lv1tfx4FTlqyIKijNu', 'q5Zyu2cPc8vuTYJFTyamHapIkzd2g8D8sjQ4QpxtdxXU3njsxLLXlrZED8Zy', '2019-04-28 14:24:27', '2019-04-28 14:24:27', '7800266', '1990-02-05', '58038381', 'rua de casa', 123456, 'casa', 'manaira', 'joa pessoa', 'pb', 'AASAAAAAA', 'Brasil', 'A', '087740834323', '12312312321', '123123123123', '12312313213', 'professor'),
(12, 'Edgar Pinheiro', 'edgar@gmail.com', '$2y$10$5IvWfX7yMN.q.uvVhDPhGuEsfewUkvwTT2hYxxlGy6VE2sz83MFk.', 're9KZvMiicyqBWriECSRIkRv9y198Xp1vqAtBc8hznTlMTxLXbHGAzS2Bfzq', '2019-04-28 14:32:19', '2019-04-28 14:32:19', '7800266', '1990-02-05', '5820213', 'rua do centro', 123456, 'casa', 'teste de bairro', 'centro', 'pb', 'centro', 'Brasil', 'A', '087740834311', '12312312321', '123123123123', '12312313213', 'aluno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos_professores`
--
ALTER TABLE `alunos_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_professores_aluno_id_foreign` (`aluno_id`),
  ADD KEY `alunos_professores_professor_id_foreign` (`professor_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coments_user_id_foreign` (`user_id`),
  ADD KEY `coments_post_id_foreign` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `comment_answers`
--
ALTER TABLE `comment_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_answers_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_answers_user_id_foreign` (`user_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_profile`
--
ALTER TABLE `permission_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_profile_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_profile_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_url_unique` (`url`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_views_user_id_foreign` (`user_id`),
  ADD KEY `post_views_post_id_foreign` (`post_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_profile_id_foreign` (`profile_id`),
  ADD KEY `profile_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_user_id_foreign` (`user_id`),
  ADD KEY `requirements_curso_id_foreign` (`curso_id`),
  ADD KEY `requirements_instituicoe_id_foreign` (`instituicoe_id`);

--
-- Indexes for table `requirements_professores`
--
ALTER TABLE `requirements_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_professores_user_id_foreign` (`user_id`),
  ADD KEY `requirements_professores_titulacoe_id_foreign` (`titulacoe_id`);

--
-- Indexes for table `titulacoes`
--
ALTER TABLE `titulacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos_professores`
--
ALTER TABLE `alunos_professores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_answers`
--
ALTER TABLE `comment_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permission_profile`
--
ALTER TABLE `permission_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requirements_professores`
--
ALTER TABLE `requirements_professores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `titulacoes`
--
ALTER TABLE `titulacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos_professores`
--
ALTER TABLE `alunos_professores`
  ADD CONSTRAINT `alunos_professores_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alunos_professores_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comment_answers`
--
ALTER TABLE `comment_answers`
  ADD CONSTRAINT `comment_answers_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `permission_profile`
--
ALTER TABLE `permission_profile`
  ADD CONSTRAINT `permission_profile_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_profile_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `post_views`
--
ALTER TABLE `post_views`
  ADD CONSTRAINT `post_views_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `profile_user`
--
ALTER TABLE `profile_user`
  ADD CONSTRAINT `profile_user_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `profile_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requirements_instituicoe_id_foreign` FOREIGN KEY (`instituicoe_id`) REFERENCES `instituicoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requirements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `requirements_professores`
--
ALTER TABLE `requirements_professores`
  ADD CONSTRAINT `requirements_professores_titulacoe_id_foreign` FOREIGN KEY (`titulacoe_id`) REFERENCES `titulacoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requirements_professores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
