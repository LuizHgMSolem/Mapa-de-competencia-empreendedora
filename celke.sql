-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Jul-2018 às 22:59
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(220) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `perguntas` (`id`, `pergunta`) VALUES
(7, 'Encontro formas de fazer as coisas mais rapidamente.'),
(8, 'Estabeleço minhas próprias metas.'),
(9, 'Ao planejar um trabalho grande, divido-o em várias etapas.'),
(10, 'Penso em soluções diferentes a fim de resolver os problemas.'),
(11, 'Alerto as pessoas caso o seu desempenho não tem sido o esperado.'),
(12, 'Confio que terei êxito em qualquer tipo de atividade que me disponha a fazer.'),
(13, 'Prefiro situações em que possa controlar ao máximo o resultado final.'),
(14, 'Desenvolvo estratégias para influenciar os outros.'),
(15, 'Comparo minhas conquistas com minhas expectativas.'),
(16, 'Sei de quanto (recursos materiais, humanos e financeiros) para meus projetos.'),
(17, 'Escuto com atenção qualquer pessoas com quem esteja conversando.'),
(18, 'Faço o que é necessário sem que os outros tenham que me pedir.'),
(19, 'Prefiro realizar novas tarefas a realizar os quais já domino'),
(20, 'Insisto várias vezes para que as pessoas façam o que eu quero.'),
(21, 'Busco orientação daqueles que conhecem as características do meu negócio.'),
(22, 'É importante, para mim, fazer um trabalho de alta qualidade.'),
(23, 'Trabalho várias horas e faço sacrifícios pessoais para finalizar minhas tarefas.'),
(24, 'Procuro formas úteis de usar meu tempo.'),
(25, 'Faço coisas sempre tendo um resultado específico em mente.'),
(26, 'Analiso com cuidado as vantagens e as desvantagens para executar uma tarefa.'),
(27, 'Penso em muitos projetos.'),
(28, 'Quando estou chateado com alguém, digo o que penso.'),
(29, 'Mantenho minha maneira de pensar mesmo que as outras discordem.'),
(30, 'Somente me envolvo com algo novo depois de ter feito o possível para meu sucesso.'),
(31, 'Dedico bastante tempo pensando na maneira de convencer os outros.'),
(32, 'Regularmente, verifico a que distância estou de conquistar meus objetivos.'),
(33, 'Sei qual o retorno financeiro que posso esperar dos meus projetos.'),
(34, 'Fico aborrecido quando não consigo fazer o que quero.'),
(35, 'Faço as coisas antes mesmo de saber precisamente como elas devem ser feitas.'),
(36, 'Fico de olho nas oportunidades para realizar coisas novas.'),
(37, 'Quando algo se interpõe entre o que estou tentando fazer, persisto em minha tarefa.'),
(38, 'Somente tomo atitudes depois de buscar todas as informações.'),
(39, 'Meu resultado no trabalho é melhor do que o das pessoas que trabalham comigo.'),
(40, 'Faço o que for necessário para terminar meu trabalho.'),
(41, 'Aborr eço-me se perco tempo.'),
(42, 'Realizo as coisas que me ajudam a conquistar meus objetivos.'),
(43, 'Tento pensar em todos os problemas que possam ocorrer e planejo as soluções.'),
(44, 'Mesmo que tenha escolhido uma maneira de resolver um problema, continuo analisando a solução para avaliar se está funcionando.'),
(45, 'Tenho facilidade em dar ordens às pessoas sobre o que elas devem fazer.'),
(46, 'Quando tento alguma coisa difícil ou que me desafia, tenho confiança.'),
(47, 'Considero minhas possibilidades de sucesso ou fracasso antes de agir.'),
(48, 'Procuro pessoas importantes para que me ajudem a atingir meus objetivos.'),
(49, 'Sei a que distância estou de conquistar meus objetivos.'),
(50, 'Preocupo-me com as consequências financeiras do que faço.'),
(51, 'Sofri fracassos no passado.'),
(52, 'Faço as coisas antes que elas se tornem urgentes.'),
(53, 'Tento fazer coisas novas e diferentes das que sempre fiz.'),
(54, 'Quando encontro uma grande dificuldade, não desisto do que busco.'),
(55, 'Ao fazer um trabalho para alguém, faço muitas perguntas.'),
(56, 'Mesmo meu trabalho estando satisfatório, invisto mais tempo em aprimorá-lo.'),
(57, 'Se estou fazendo um trabalho para outra pessoa, esforço-me bastante para que ela fique realmente satisfeita com os resultados.'),
(58, 'Procuro formas mais econômicas para fazer as coisas.'),
(59, 'Minhas metas correspondem ao que é importante para mim.'),
(60, 'Antecipo os prováveis problemas em vez de ficar aguardando que aconteçam.'),
(61, 'Penso em diferentes formas de resolver os problemas.'),
(62, 'Demonstro quando discordo das pessoas.'),
(63, 'Sou muito persuasivo com os outros.'),
(64, 'Realizo coisas arriscadas.'),
(65, 'Com a finalidade de alcançar meus objetivos, busco soluções que tragam benefícios a todas as pessoas envolvidas.'),
(66, 'Coordeno a atuação das pessoas que trabalham comigo.'),
(67, 'Tenho bom controle sobre as minhas finanças.'),
(68, 'Houve situações em que tirei vantagem de alguém.'),
(69, 'Não espero receber ordens dos outros para depois agir.'),
(70, 'Aproveito as oportunidades que surgem.'),
(71, 'Encontro várias formas de superar os obstáculos à realização dos meus objetivos.'),
(72, 'Procuro diferentes fontes de informação a fim de realizar meu trabalho.'),
(73, 'Quero que o meu empreendimento seja o melhor do ramo.'),
(74, 'Não permito que o meu trabalho interfira na minha vida familiar ou pessoal.'),
(75, 'Controlo sistematicamente o dinheiro que uso no meu negócio.'),
(76, 'Possuo uma visão clara do meu futuro.'),
(77, 'Tenho uma abordagem lógica e sistemática das minhas atividades.'),
(78, 'Se uma determinada maneira de resolver um problema não dá certo, tento outra.'),
(79, 'Digo às pessoas o que elas têm que fazer, ainda que elas não queiram fazê-lo.'),
(80, 'Mantenho-me firme em minhas decisões, mesmo se outras pessoas discordam delas de forma enérgica.'),
(81, 'Faço as coisas que as outras pessoas consideram arriscadas.'),
(82, 'Identifico as pessoas capazes de me ajudar a atingir meus objetivos.'),
(83, 'Quando estou trabalhando com uma data de entrega, verifico regularmente se posso terminar o trabalho no prazo estipulado.'),
(84, 'Meus projetos incluem questões financeiras.'),
(85, 'Caso não saiba alguma coisa, não tenho problemas em reconhecer.')
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
