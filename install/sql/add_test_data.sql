--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `adminlevel`) VALUES
(1, 'antti', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 1),
(34, 'test', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 1),
(44, 'Henkilö 1', '$2y$10$3qB/pu6oqSGootWsK/cXXerTJGoPVEbblUVsQPWU03j2h0VUWNfjK', 0),
(45, 'Henkilö 2', '', 0),
(46, 'Henkilö 3', '', 0),
(47, 'Henkilö 4', '', 0),
(48, 'Henkilö 5', '', 0);


--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `a_id`, `name`, `info`, `active`) VALUES
(20, 44, 'Iso ryhmä', 'Asiatekstiä', 1),
(21, 47, 'Pieni ryhmä', 'Asiatekstiä', 1);

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `g_id`, `u_id`) VALUES
(16, 20, 44),
(17, 20, 45),
(18, 20, 46),
(19, 21, 47),
(20, 21, 48);

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `phone`, `email`) VALUES
(3, 'Isännöitsijä 1', '123456789', 'nimi@ta.fi'),
(4, 'Isännöitsijä 2', '0987654321', 'suku@ta.fi');

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `o_id`, `address`, `city`, `maintenance`, `billingcode`) VALUES
(6, 3, 'Finnoontie 2', 'Espoo', 'Kiinteistöhuolto Oy', '1234'),
(7, 3, 'Hakunilantie 30', 'Vantaa', 'Kiinteistöhuolto Oy', '2345'),
(8, 4, 'Mannerheimintie 50', 'Helsinki', 'Kiinteistöhuolto Oy', '3456');


--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `g_id`, `p_id`, `name`, `info`, `active`) VALUES
(11, 20, 6, 'Leikkuuta 21.4', 'Kaikkien pensaiden leikkuu', 1),
(12, 20, 6, 'Kitkentä 19.4', 'Hiekka-alueiden kitkentä', 1),
(13, 21, 8, 'Nurmikon leikkuu 23-25.4.2016', 'Leikkuu jossain', 1);
--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `u_id`, `date`, `start_time`, `end_time`, `t_id`) VALUES
(18, 44, '2016-04-19', '08:30:00', '11:30:00', 12),
(19, 44, '2016-03-23', '08:00:00', '12:00:00', 11),
(20, 44, '2016-03-22', '12:30:00', '16:00:00', 11),
(21, 44, '2016-03-23', '08:30:00', '11:30:00', 11),
(22, 44, '2016-03-24', '08:38:00', '16:38:00', 11),
(23, 44, '2016-03-24', '08:52:00', '13:52:00', 11);
