DROP DATABASE IF EXISTS task_api;
CREATE DATABASE task_api;
USE task_api;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tasks` (
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `task_start_date` datetime NOT NULL,
  `task_end_date` datetime NOT NULL,
  `task_status` tinyint(1) NOT NULL DEFAULT 1,
  `fk_task_id_user` bigint(20) UNSIGNED NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Extraindo dados da tabela `tasks`

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_start_date`, `task_end_date`, `task_status`, `fk_task_id_user`) VALUES
(1, 'Desenvolver uma Loja Virtual', 'Preciso desenvolver uma loja virtual para a empresa JOANNA MULTIMARCAS, usar Wordpress + Woocommerce e Hospedar.', '2023-03-08 00:01:00', '2023-03-22 23:59:59', 1, 1),
(2, 'Levar o Carro para Lavar', 'No sábado, preciso levar o carro ao Lava Jato do Marquinho', '2023-03-11 09:00:00', '2023-03-11 12:00:00', 1, 1),
(3, 'Ir ao Mercado', 'Preciso ir ao mercado no domingo pela manhã e fazer as compras do mês', '2023-03-12 08:00:00', '2023-03-12 11:30:00', 1, 1),
(4, 'Finalizar meu TCC', 'Preciso retornar ao meu TCC', '2023-03-13 18:00:00', '2023-03-31 18:00:00', 1, 1);

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, 'Administrador', 'administrador@taskapi.com', NULL, '$2y$10$oozw1KmJuHUBC2rSO5OdduI/0DPWsb.SGoV9aX.2zl.OSNfRuYHXG', NULL);



--
-- Índices para tabela `tasks`
--

ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Índices para tabela `users`
--

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

-- AUTO_INCREMENT de tabelas despejadas
--


--
-- AUTO_INCREMENT de tabela `tasks`
--

ALTER TABLE `tasks`
  MODIFY `task_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

--
-- Limitadores para a tabela `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`fk_task_id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;