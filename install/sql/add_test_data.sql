INSERT INTO `users` (`id`, `name`, `password`, `adminlevel`) VALUES
(1, 'test', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 1),
(2, 'Henkilö 1', '$2y$10$3qB/pu6oqSGootWsK/cXXerTJGoPVEbblUVsQPWU03j2h0VUWNfjK', 0),
(3, 'Henkilö 2', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 0),
(4, 'Henkilö 3', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 0),
(5, 'Henkilö 4', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 0),
(6, 'Henkilö 5', '$2y$10$kaUXdiWomc49sX68q4o6yulUKSIz.qWqQsXCmWOgR5EKZ60D4XAuW', 0);

INSERT INTO `groups` (`id`, `a_id`, `name`, `info`, `active`) VALUES
(1, 2, 'Iso ryhmä', 'Asiatekstiä', 1),
(2, 5, 'Pieni ryhmä', 'Asiatekstiä', 1);

INSERT INTO `memberships` (`id`, `g_id`, `u_id`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 2, 3),
(5, 2, 3);

INSERT INTO `owners` (`id`, `name`, `phone`, `email`) VALUES
(1, 'Isännöitsijä 1', '123456789', 'nimi@firma.fi'),
(2, 'Isännöitsijä 2', '0987654321', 'suku@firma.fi');

INSERT INTO `places` (`id`, `o_id`, `address`, `city`, `maintenance`, `billingcode`) VALUES
(1, 1, 'Finnoontie 2', 'Espoo', 'Kiinteistöhuolto Oy', '1234'),
(2, 1, 'Hakunilantie 30', 'Vantaa', 'Kiinteistöhuolto Oy', '2345'),
(3, 2, 'Mannerheimintie 50', 'Helsinki', 'Kiinteistöhuolto Oy', '3456');

INSERT INTO `tasks` (`id`, `g_id`, `p_id`, `name`, `info`, `active`) VALUES
(1, 1, 1, 'Leikkuuta 21.4', 'Kaikkien pensaiden leikkuu', 1),
(2, 1, 2, 'Kitkentä 19.4', 'Hiekka-alueiden kitkentä', 1),
(3, 2, 3, 'Nurmikon leikkuu 23-25.4.2016', 'Leikkuu jossain', 1);

INSERT INTO `times` (`id`, `u_id`, `date`, `start_time`, `end_time`, `t_id`) VALUES
(1, 2, '2016-04-19', '08:30:00', '11:30:00', 1),
(2, 2, '2016-03-23', '08:00:00', '12:00:00', 1),
(3, 2, '2016-03-22', '12:30:00', '16:00:00', 1),
(4, 2, '2016-03-23', '08:30:00', '11:30:00', 1),
(5, 2, '2016-03-24', '08:38:00', '16:38:00', 1),
(6, 2, '2016-03-24', '08:52:00', '13:52:00', 1);
