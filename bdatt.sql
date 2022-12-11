-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02/11/2022 às 08:59
-- Versão do servidor: 5.7.39-cll-lve
-- Versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `emrstecc_painel`
--
CREATE DATABASE IF NOT EXISTS `emrstecc_painel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emrstecc_painel`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativos`
--

CREATE TABLE `ativos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `ativos`
--

INSERT INTO `ativos` (`id`, `nome`) VALUES
(1, 'computador'),
(2, 'internet'),
(3, 'roteador'),
(4, 'impressora'),
(5, 'mudança de setor'),
(6, 'painel de senhas'),
(7, 'scanner'),
(8, 'painel consultorios'),
(9, 'monitor'),
(10, 'switch'),
(11, 'pacote office'),
(12, 'suporte a usuario'),
(13, 'sistema terceiro'),
(14, 'tonner'),
(15, 'pasta de rede'),
(17, 'senha'),
(18, 'ponto de rede'),
(19, 'servidor'),
(20, 'falha de energia'),
(21, 'suporte de infra'),
(22, 'windows'),
(23, 'ponto de telefone'),
(24, 'cabeamento'),
(27, 'RAMAL'),
(28, 'Equipamentos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `tec_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ativos_id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `conteudo` text NOT NULL,
  `resposta` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `tec_id`, `user_id`, `ativos_id`, `data`, `conteudo`, `resposta`, `status`) VALUES
(14, 4, 27, 18, '2022-08-01 00:00:00', 'pontos de redes para a nova sala do posto de enfermagem', 'os pontos de rede foram disponibilizados para o departamento', 1),
(15, 4, 28, 13, '2022-08-01 00:00:00', 'não consigo acessar a página de raio-x da onelaudos', 'a senha foi configurada novamente', 1),
(16, 4, 6, 4, '2022-08-01 00:00:00', 'instalar impressora de etiquetas', 'a impressora zebra foi instalada no departamento', 1),
(17, 4, 21, 4, '2022-08-01 00:00:00', 'pedido de troca de tonner', 'troca do tonner efetuada', 1),
(18, 4, 29, 4, '2022-08-02 00:00:00', 'pedido de troca de tonner', 'troca do tonner efetuada', 1),
(19, 4, 30, 17, '2022-08-02 00:00:00', 'wifi', 'a senha foi passada', 1),
(20, 4, 21, 17, '2022-08-02 00:00:00', 'sistema salutem', 'foi passada a senha para o usuario', 1),
(21, 4, 31, 1, '2022-08-03 00:00:00', 'computador não esta ligando', 'alteração de boot do sistema windows', 1),
(22, 4, 20, 2, '2022-08-03 00:00:00', 'consta como conectado mas não funciona', 'apos comando do cmd, a internet voltou a funcionar', 1),
(23, 4, 5, 11, '2022-08-04 00:00:00', 'documento não sai completo na impressão', 'foi verificado que o arquivo estava corrompido', 1),
(24, 4, 27, 18, '2022-08-04 00:00:00', 'enfermaria c sem internet', 'o ponto de rede foi verificado e internet voltou a funcionar', 1),
(25, 4, 32, 18, '2022-08-04 00:00:00', 'internet não funciona', 'ponto de rede verificado e  a internet voltou a funcionar', 1),
(26, 4, 17, 2, '2022-08-04 00:00:00', 'consultorios 1 e 4 estão sem internet', 'após comando do cdm voltou a funcionar', 1),
(27, 4, 18, 4, '2022-08-04 00:00:00', 'impressora de etiquetas não esta imprimindo', 'foi configurada e voltou a imprimir', 1),
(28, 4, 10, 4, '2022-08-04 00:00:00', 'impressora de etiquetas parou de imprimir na recepção', 'foi configurada e voltou a imprimir', 1),
(29, 4, 17, 18, '2022-08-02 00:00:00', 'consultorio 5 esta sem internet', 'foi verificado o ponto de rede e voltou a funcionar', 1),
(30, 4, 22, 13, '2022-08-04 00:00:00', 'preciso do acesso a sistema pr', 'foi passado o acesso para o usuario', 1),
(31, 4, 12, 13, '2022-08-04 00:00:00', 'o sistema salutem não entra', 'configuração de ip manual na maquina', 1),
(32, 4, 31, 13, '2022-08-05 00:00:00', 'o sistema salutem não funciona nas maquinas', 'configuração de ip manual', 1),
(33, 4, 33, 4, '2022-08-08 00:00:00', 'configurar impressora ', 'foi configurada', 1),
(34, 4, 19, 13, '2022-08-05 00:00:00', 'sistema salutem não funciona ', 'configurado ip manual', 1),
(35, 4, 19, 4, '2022-08-08 00:00:00', 'impressora não imprime', 'impressora reinstalada na maquina', 1),
(36, 4, 33, 1, '2022-08-02 00:00:00', 'kit para usuario do setor', 'kit montado ', 1),
(37, 4, 14, 4, '2022-08-08 00:00:00', 'não esta imprimindo', 'configuração da impressora', 1),
(38, 4, 14, 17, '2022-08-10 00:00:00', 'pedido de senha wifi', 'a senha foi passada para o usuario', 1),
(39, 4, 23, 15, '2022-08-08 00:00:00', 'pedido de pasta para usuario', 'pasta configurada', 1),
(40, 4, 22, 1, '2022-08-09 00:00:00', 'não consigo acessar a conta de usuario windows', 'foi feita a configuração de usuario ', 1),
(41, 4, 22, 3, '2022-08-01 00:00:00', 'wifi não funciona ', 'foi configurado novamente', 1),
(42, 4, 19, 12, '2022-08-01 00:00:00', 'criar usuarios de rede windows', 'as contas foram criadas', 1),
(43, 4, 19, 4, '2022-08-01 00:00:00', 'não esta imprimindo', 'configurada novamente na maquina', 1),
(44, 4, 19, 4, '2022-08-04 00:00:00', 'não imprime', 'configurada novamente na maquina', 1),
(45, 4, 19, 13, '2022-08-05 00:00:00', 'sistema salutem não funciona', 'configuração ip manual', 1),
(46, 4, 34, 18, '2022-08-09 00:00:00', 'computador conecta na internet', 'foi verificado os pontos de rede', 1),
(47, 4, 3, 13, '2022-08-09 00:00:00', 'salutem  não entra', 'queda no serviço da salutem', 1),
(48, 4, 3, 24, '2022-08-04 00:00:00', 'coordenadora precisa de cabo de rede para o notebook', 'disponibilizamos ', 1),
(49, 4, 15, 4, '2022-08-09 00:00:00', 'não esta imprimindo', 'foi configurada novamente na maquina', 1),
(50, 4, 11, 4, '2022-08-03 00:00:00', 'troca de tonner', 'o tonner foi trocado', 1),
(51, 4, 11, 4, '2022-08-09 00:00:00', 'impressora não imprime da bandeija 2', 'configuração realizada', 1),
(52, 1, 22, 7, '2022-08-11 00:00:00', 'Instalar novo scanner de mesa no setor', 'após a infra de elétrica ficar pronta instalamos o equipamento na rede.', 1),
(53, 4, 3, 24, '2022-08-12 00:00:00', 'mal contato', 'resolvido', 1),
(54, 1, 5, 27, '2022-08-11 00:00:00', 'mudar ramal para outro ponto da sala por motivo de mudança de layout', 'ramal trransferido para nova posição conforme solicitado', 1),
(55, 1, 35, 18, '2022-08-11 00:00:00', 'Ativar ponto de rede para nova sala da gerente assistencial', 'ponto ativado e configurado ', 1),
(56, 1, 36, 1, '2022-08-11 00:00:00', 'instalar pc na nova sala de coleta que já está com mobiliário', 'computador instalado e configurado', 1),
(57, 1, 32, 12, '2022-08-11 00:00:00', 'Verificar senha de usuário de rede', 'senha verificada e funcionando corretamente', 1),
(58, 1, 22, 18, '2022-08-10 00:00:00', 'verificar a possibilidade de novo ponto de rede para o novo scanner de mesa que seráinstalado no setor', 'ponto passado e ativado para o novo dispositivo de rede', 1),
(59, 1, 27, 18, '2022-08-10 00:00:00', 'verificar o ponto de rede no posto de enfermagem', 'ponto de rede testado e funcionando normalmente', 1),
(60, 1, 10, 14, '2022-08-12 00:00:00', 'Trocar Toner no consultório 3', 'Toner trocado', 1),
(61, 1, 32, 12, '2022-08-12 00:00:00', 'Verificar PC da diretora que não está com Papel de parede de agosto', 'Ponto de rede verificado e configurações de gpo feitas, papel de parede de volta ', 1),
(62, 1, 36, 28, '2022-08-12 00:00:00', 'Retirar estabilizador que não está sendo utilizado no setor', 'Estabilizador retirado conforme solicitado ', 1),
(63, 1, 32, 9, '2022-08-12 00:00:00', 'TROCAR monitor que apresenta falhas constantes', 'Monitor substituto ', 1),
(64, 1, 32, 4, '2022-08-12 00:00:00', 'Instalar impressora na Diretoria técnica ', 'Impressora Instalada na rede  com sucesso ', 1),
(65, 1, 22, 7, '2022-08-13 00:00:00', 'Scanner não encontra a pasta de rede correta', 'Verificada a rede notamos que o scanner estava sem conexão, um switch parou de funcionar e causou o problema, cabo de rede direto na porta do scanner para resolver o problema ', 1),
(66, 4, 37, 2, '2022-08-15 00:00:00', 'Internet não funciona ', 'Foi verificado e a internet está funcionando normalmente ', 1),
(67, 4, 22, 7, '2022-08-15 00:00:00', 'Suporte a manuseio', 'Esclarecido as dúvidas sobre o manuseio ', 1),
(68, 1, 5, 12, '2022-08-16 00:00:00', 'Realizar cópia de arquivos de um pen drive para um DVD ', 'Arquivos copiados com, DVD funcionando normalmente ', 1),
(70, 4, 23, 13, '2022-08-16 00:00:00', 'intalação do programa ocam', 'solicitação atendida', 1),
(71, 4, 23, 11, '2022-08-16 00:00:00', 'intalação do visiopro', 'solicitação atendida', 1),
(72, 1, 15, 12, '2022-08-16 00:00:00', 'Configurar novo usuário para divisão médica ', 'Computador e impressora configurados para a colaboradora nicoly', 1),
(73, 1, 23, 12, '2022-08-16 00:00:00', 'Configurar PC para novo colaborador do setor ', 'PC configurado conforme solicitado ', 1),
(74, 1, 22, 10, '2022-08-16 00:00:00', 'Verificar switch que apresenta mal contato ', 'Equipamento instalado na parede ficando longe do contato dos usuários, rede normalizada. ', 1),
(75, 1, 34, 21, '2022-08-16 00:00:00', 'Verificar o cabeamento do estoque da cozinha ', 'Vistoria feita e infra de rede modificada para não ficar no acesso dos usuários ', 1),
(76, 4, 10, 14, '2022-08-17 00:00:00', 'Troca de Toner na sutura e e consultório 6', 'Solicitação atendida ', 1),
(77, 4, 18, 13, '2022-08-17 00:00:00', 'Sissonline ', 'O usuário foi auxiliado na inclusão do sistema nas máquinas ', 1),
(78, 4, 39, 14, '2022-08-17 00:00:00', 'Tonner vazio', 'Solicitação atendida ', 1),
(79, 4, 17, 28, '2022-08-18 00:00:00', 'maquina de ultrassom não envia as imagens PARA A IMPRESSORA PROVAVEL QUE SEJA A INTERNET', 'FOI VERIFICADO  que o ponto de rede não estava funcionado, o equipamento foi ligado em outro ponto de rede', 1),
(80, 1, 26, 10, '2022-08-19 00:00:00', '2 Computadores estão sem acesso à Internet ', 'Verificados o PC e o switch da sala precisou ser reiniciado ', 1),
(81, 4, 7, 13, '2022-08-19 00:00:00', 'Colocar o link da salutem no Pc ', 'Solicitação atendida ', 1),
(82, 4, 14, 14, '2022-08-22 00:00:00', 'pedido de tonner', 'solicitação atendida', 1),
(83, 4, 40, 14, '2022-08-22 00:00:00', 'pedido de tonner', 'solicitação atendida', 1),
(85, 4, 10, 8, '2022-08-22 00:00:00', 'o paniel não esta funcionando', 'reiniciamos e voltou a funcionar ', 1),
(86, 4, 17, 9, '2022-08-22 00:00:00', 'Computador não está funcionado ', 'O cabo de energia do monitor estava mal conectado ', 1),
(87, 4, 42, 24, '2022-08-22 00:00:00', 'Mudamos a impressora de lugar e precisamos de um cabo maior', 'Solicitação atendida ', 1),
(88, 4, 3, 12, '2022-08-22 00:00:00', 'Preciso instalar o sistema de ponto fornecido pelo rh', 'O usuário Fabio foi orientado ', 1),
(89, 4, 10, 21, '2022-08-23 00:00:00', 'reposicionamento dos filtros de linha ', 'o filtro estão preparados para fixação nos locais corretos ', 1),
(90, 4, 17, 4, '2022-08-23 00:00:00', 'não esta funcionado no consultorio 4', 'mau contato no cabo de dados ', 1),
(91, 4, 17, 10, '2022-08-23 00:00:00', 'Sem internet no consultório 3', 'O swith foi reiniciado e voltou a funcionar normalmente ', 1),
(92, 4, 18, 4, '2022-08-23 00:00:00', 'impressora só esta imprimindo de uma maquina ', 'a impressora foi reconfigurada nas maquinas novamente ', 1),
(93, 4, 19, 4, '2022-08-23 00:00:00', 'a maquina do fernando não esta imprimindo ', 'a impressora foi reconfigurada na maquina ', 1),
(94, 1, 15, 4, '2022-08-23 00:00:00', 'Impressora da diretoria não imprime ', 'Configuração feita e impressora ok', 1),
(95, 4, 11, 4, '2022-08-23 00:00:00', 'Impressora mostrando que tamanho do papel está incorreto ', 'Foi configurada e voltou ao seu funcionamento normal', 1),
(96, 4, 6, 13, '2022-08-23 00:00:00', 'Precisamos da instalação do cadsus nas máquinas ', 'O sistema foi instalado', 1),
(97, 1, 30, 4, '2022-08-23 00:00:00', 'Instalar impressora da diretoria ', 'Impressora instalada com sucesso ', 1),
(98, 4, 10, 4, '2022-08-24 00:00:00', 'uma maquina da recepção não esta encontrando a impressora ', 'a impressora foi excluida pelo usuario!  adicionamos novamente', 1),
(99, 1, 6, 2, '2022-08-25 00:00:00', 'Um dos computadores está sem Internet ', 'Verificado o ponto de rede e tudo normalizado', 1),
(100, 4, 27, 4, '2022-08-25 00:00:00', 'A impressora da enfermaria a/b não está funcionado ', 'A impressora está com problema e os computadores das enfermarias: a,b,c,E foram configurados na impressora da recepção central', 1),
(101, 4, 34, 1, '2022-08-26 00:00:00', 'o computador do anfiteatro liga mas não dá imagem', 'o cabo vga estava desconectado, conectamos novamente', 1),
(102, 4, 17, 4, '2022-08-26 00:00:00', 'A impressora no consultório 3 não está funcionado ', 'O cabo de rede estava desconectado do swith', 1),
(103, 4, 12, 7, '2022-08-29 00:00:00', 'estou escaneando mas os arquivos não estão aparecendo na pasta ', 'o usuario foi orientado a clicar na data de modificação para visualizar o arquivos escaneados recentemente ', 1),
(104, 4, 43, 4, '2022-08-29 00:00:00', 'meu computador não consegue mandar impressão para a impressora da recepção central ', 'a impressora foi configurada novamente ', 1),
(105, 1, 32, 15, '2022-08-29 00:00:00', 'PC não tem acesso à pasta diretoria técnica ', 'Após acesso remoto a pasta diretoria técnica e scanner BHCL foram mapeadas conforme solicitado ', 1),
(107, 4, 11, 4, '2022-08-31 00:00:00', 'Impressora não está imprimindo ', 'O problema no swith, solucionado ', 1),
(108, 4, 11, 14, '2022-08-31 00:00:00', 'Impressão saindo falhada ', 'Foi trocado o tonner ', 1),
(109, 1, 11, 10, '2022-08-30 00:00:00', 'Os 2 PCs estão sem Internet ', 'Verificado no switch, um cabo de rede estava desconectado', 1),
(110, 1, 32, 4, '2022-08-31 00:00:00', 'Impressora está aparecendo offline ', 'Cabo de rede estava desconectado', 1),
(111, 4, 11, 1, '2022-08-31 00:00:00', 'Computador NÃO está ligando ', 'Foi necessário resetar a BIOS do equipamento ', 1),
(112, 4, 40, 4, '2022-09-01 00:00:00', 'a impressora esta com papel preso e não tem como tirar ', 'foi verificado o problema e foi passado para \"ra fontes\"', 1),
(113, 4, 40, 4, '2022-09-01 00:00:00', 'a impressora esta com papel preso e não tem como tirar ', 'foi verificado o problema e foi passado para \"ra fontes\"', 1),
(114, 4, 10, 6, '2022-09-01 00:00:00', 'o painel da triagem parou de funcionar', 'o painel foi reiniciado', 1),
(116, 4, 10, 4, '2022-09-01 00:00:00', 'Computador da soroterapia não está enviado as impressões para a impressora da emergência ', 'A impressora foi configurada na máquina ', 1),
(117, 4, 5, 12, '2022-09-01 00:00:00', 'preciso do icone da salutem no meu computador ', 'solicitação atendida', 1),
(118, 4, 17, 1, '2022-09-01 00:00:00', 'consultorio 3 o computador não inicia', 'verificamos e reiniciamos a maquina', 1),
(119, 4, 44, 28, '2022-09-02 00:00:00', 'Telefone não está funcionado ', 'O aparelho foi trocado ', 1),
(120, 4, 24, 14, '2022-09-02 00:00:00', 'troca de tonner ', 'solicitação atendida ', 1),
(121, 4, 27, 4, '2022-09-02 00:00:00', 'o computador da enfermaria a/b não esta imprimindo na emergencia ', 'a impressora FOI CONFIGURADA NOVAMENTE', 1),
(122, 4, 29, 4, '2022-09-04 00:00:00', 'não consigo fechar a gaveta da impressora impressora  e fica atolando as impressões', 'o usuario foi instruido via chamada de video e o problema foi solucionado ', 1),
(123, 4, 17, 2, '2022-09-05 00:00:00', 'o computador do consultorio 3 não esta funcionando', 'ao verificar percebi que o problema era internet, pois a maquina estava funcionado, e o problema DE INTERNET FOI RESOLVIDO', 1),
(124, 4, 45, 4, '2022-09-05 00:00:00', 'impressora não esta imprimindo', 'o equipamento foi reiniciado ', 1),
(125, 4, 33, 11, '2022-09-06 00:00:00', 'Preciso do pacote office ', 'Solicitação atendida ', 1),
(126, 4, 10, 4, '2022-09-06 00:00:00', 'Impressora não está imprimindo ', 'Foi verificado e impressora esta imprimindo novamente ', 1),
(127, 4, 29, 28, '2022-09-06 00:00:00', 'Telefone está com problema ', 'O aparelho foi trocado ', 1),
(128, 4, 15, 4, '2022-09-06 00:00:00', 'Não está imprimindo ', 'A impressora foi configurada novamente ', 1),
(129, 1, 32, 4, '2022-09-06 00:00:00', 'Impressora da diretoria offline ', 'Equipamento verificado e operando normalmente ', 1),
(130, 1, 16, 11, '2022-09-06 00:00:00', 'Instalar pacote Office ', 'Pacote instalado conforme solicitado ', 1),
(131, 1, 6, 9, '2022-09-05 00:00:00', 'Monitor queimado', 'Feita a troca do monitor com defeito ', 1),
(132, 4, 10, 4, '2022-09-08 00:00:00', 'impressora da sala de sutura não esta imprimindo ', 'a mesma foi verificada e testada e esta funcionando normalmente', 1),
(133, 4, 3, 17, '2022-09-08 00:00:00', 'não consigo acessar a conto de usuario local para abrir um programa ', 'o usuario e senha estavam incorretos para acessar a conta local do sistema operacional', 1),
(134, 4, 43, 24, '2022-09-09 00:00:00', 'Preciso de ponto de rede ', 'Foi feito o keystone e Disponibilizamos  cabo de rede ', 1),
(135, 4, 27, 4, '2022-09-09 00:00:00', 'impressora não esta imprimindo  na enfermaria a/b', 'foi verificado o cabo de dados e impressora voltou a imprimir normalmente', 1),
(136, 1, 32, 24, '2022-09-12 00:00:00', 'Ligar os equipamentos após pintura da sala', 'os 2 pcs e a impressora foram ligados novamente e ficaram ok', 1),
(137, 1, 19, 11, '2022-09-12 00:00:00', 'excel de um pc pedindo a compra da licença', 'pacote office ativado e funcionando corretamente', 1),
(138, 4, 10, 4, '2022-09-12 00:00:00', 'a impressora do consultorio 6 não esta fincionado ', 'foi verificado e a impressora esta com problema, informamos a rafontes sobre o problema e estamos aguardando o retorno ', 1),
(139, 4, 23, 4, '2022-09-12 00:00:00', 'atolamento de papel', 'foi verificado e não é possivel retirar o atolamento da impressora, E INFORMAMOS A RAFONTES SOBRE O PROBELMA E ESTAMOS AGUARDANDO RETORNO', 1),
(140, 4, 21, 11, '2022-09-12 00:00:00', 'preciso que instalem o visiopro ', 'solicitação atendida', 1),
(141, 4, 15, 4, '2022-09-13 00:00:00', 'configuração provisoria de impressora', 'a impressora foi configurada na maquina ', 1),
(142, 4, 4, 4, '2022-09-13 00:00:00', 'acompanhamento da empresa rafontes', 'acompanhamos o tecnico eduardo na resoluçao das impressoras do scih, farmacia, e consultorio 6  Ps', 1),
(143, 4, 3, 24, '2022-09-13 00:00:00', 'ponto de rede não esta funcionado ', 'verificamos o rack da capelania, reiniciamos o switch', 1),
(144, 4, 34, 4, '2022-09-14 00:00:00', 'o lactario não esta conseguindo fazer impressoes aqui na nutrição ', 'a impressora foi configurada no lactario ', 1),
(145, 1, 45, 8, '2022-09-13 00:00:00', 'após atualização do sistema o painel dos médicos não está chamando', 'via acesso remoto o painel foi reiniciado e ficou ok', 1),
(146, 1, 19, 18, '2022-09-14 00:00:00', 'favor verificar ponto de rede no faturamento, algumas máquinas estão sem internet', 'switch verificado e ponto de rede ok', 1),
(147, 1, 15, 4, '2022-09-14 00:00:00', 'pc não imprime', 'impressora correta instalada', 1),
(148, 1, 19, 24, '2022-09-14 00:00:00', 'máquina da colaboradora neide sem rede', 'refeito o cabo de rede desta máquina, rede normalizada', 1),
(149, 1, 6, 4, '2022-09-13 00:00:00', 'impressora de etiquetas não imprime', 'trocado o ribon e etiquetadora ok novamente', 1),
(150, 4, 10, 14, '2022-09-14 00:00:00', 'preciso que troque o teonner da impressora', 'solicitação atendida', 1),
(151, 4, 45, 4, '2022-09-15 00:00:00', 'a impressora do plantão esta com papel preso atraz da impressora ', 'foi verificado, e impressora esta impossibilitada de fazer impressões, encaminhamos as impressoes do setor para recepção ps. informamos os responsaveis da rafontes ', 1),
(152, 4, 6, 4, '2022-09-15 00:00:00', 'não estamos conseguindo imprimir ', 'devido a problema na impressora do plantão adm, todas as maquina do setor foram encaminhadas para imprimir na recepção ps', 1),
(153, 4, 10, 4, '2022-09-15 00:00:00', 'consultorio 6 do ps a impressora não funciona ', 'foi verificado e o problema era no cabo de dados da impressora, O MESMO FOI TROCADO.', 1),
(154, 4, 27, 4, '2022-09-15 00:00:00', 'na enfermaria-e, não estou conseguindo imprimir ', 'a impressora foi configurada novamente na maquina ', 1),
(155, 4, 27, 14, '2022-09-19 00:00:00', 'preciso de tonner na enfermaria a-b', 'solicitação atendida', 1),
(156, 4, 28, 24, '2022-09-19 00:00:00', 'Computador não está funcionado internet ', 'Foi verificado o cabo de rede no computador e após a VERIFICAÇÃO, a internet voltou a funcionar ', 1),
(157, 4, 29, 14, '2022-09-19 00:00:00', 'preciso que troque o tonner', 'solicitaÇÃO ATENDIDA', 1),
(158, 1, 46, 24, '2022-09-19 00:00:00', 'Passar cabeamento de rede do CPD até a usina de oxigênio ', 'Passagem de cabo feita, falta os responsáveis pelo sistema da usina configurarem o monitoramento ', 1),
(159, 4, 27, 14, '2022-09-19 00:00:00', 'presciso que troquem o toner na enfermaria f', 'solicitação atendida ', 1),
(160, 4, 17, 28, '2022-09-20 00:00:00', 'a internet não ta funcionando ', 'o switch esta com mal contato ', 1),
(161, 4, 45, 4, '2022-09-20 00:00:00', 'acompanhamento da ra fontes na resolução do problema da impressora', 'RESOLUÇÃO CONCLUIDA ', 1),
(162, 4, 45, 4, '2022-09-20 00:00:00', 'acompanhamento da ra fontes na resolução do problema da impressora', 'RESOLUÇÃO CONCLUIDA ', 1),
(163, 4, 45, 14, '2022-09-20 00:00:00', 'PRECISO DE TONNER ', 'SOLICITAÇÃO ATENDIDA', 1),
(164, 4, 11, 14, '2022-09-20 00:00:00', 'preciso de tonner', 'solicitação atendida', 1),
(165, 4, 23, 14, '2022-09-20 00:00:00', 'preciso de tonner', 'solicitação atendida', 1),
(166, 4, 10, 14, '2022-09-20 00:00:00', 'preciso de tonner no consultorio 6', 'solicitação atendida', 1),
(167, 4, 3, 28, '2022-09-20 00:00:00', 'configuração de leitor de codigos de barra', 'o equipamento foi configurado ', 1),
(168, 4, 28, 17, '2022-09-22 00:00:00', 'não consigo lembra minha senha do windows', 'a senha foi redefinida ', 1),
(169, 4, 28, 13, '2022-09-22 00:00:00', 'não tenho o sistema salutem na meu computador', 'foi adicionado o icone do sistema salutem ', 1),
(170, 4, 20, 21, '2022-09-23 00:00:00', 'computador e ponto de tede', 'a maquina foi montada e ativamos o ponto de rede para o setor de compras ', 1),
(171, 4, 16, 24, '2022-09-26 00:00:00', 'a internet não esta funcionado', 'foi verificado a situação e reativamos o ponto no rack do coreme ', 1),
(172, 4, 17, 24, '2022-09-26 00:00:00', 'a impressora não esta imprimindo no consultorio 3', 'foi verificado e o cabo de rede da impressora estava desconectado ', 1),
(173, 4, 10, 8, '2022-09-26 00:00:00', 'o painel não esta funcionando ', 'foi verificado e o equipamento de funcionamento do painel estava desligado ', 1),
(174, 4, 10, 2, '2022-09-26 00:00:00', 'não esta funcionado a internet no setor de coleta', 'foi verificado e resolvido a situação do ponto de rede', 1),
(175, 1, 17, 1, '2022-09-27 00:00:00', 'Após terminal o PC da Nathália não está ligando, favor verificar! ', 'PC verificado e funcionando normalmente ', 1),
(176, 1, 17, 2, '2022-09-27 00:00:00', 'Consultório 3 sem Internet ', 'Switch que liga os equipamentos apresentando falhas ao ser movimentado, ficou funcionando porém necessita ser trocado ', 1),
(177, 1, 17, 4, '2022-09-27 00:00:00', 'Verificar impressora do consultório 5', 'Bandeja 1 estava aberta sem que o usuário percebesse ', 1),
(178, 4, 43, 4, '2022-09-27 00:00:00', 'não estou conseguindo imprimir\r\n', 'a impressora foi configurada novamente ', 1),
(179, 4, 27, 4, '2022-09-28 00:00:00', 'não consigo imprimir no posto de enfermagem ', 'a impressora foi configurada novamente', 1),
(180, 4, 18, 4, '2022-09-28 00:00:00', 'todas as maquinas da recepção não estão imprimindo ', 'foi verificado e configuramos as impressoras nas maquinas', 1),
(181, 4, 10, 1, '2022-09-28 00:00:00', 'o computador do consultorio 3 fica com a tela piscando e não da pra mecher em nada ', 'foi verificado e a maquina estava apresentando defeito, foi feito a troca do equipamento ', 1),
(182, 1, 34, 24, '2022-09-28 00:00:00', 'Ajuste de cabos de rede no setor ', 'Cabos ajustados, havia muita sobra ', 1),
(183, 4, 9, 24, '2022-09-28 00:00:00', 'internet não esta funcionando', 'foi  verificado e reinicamos o switch da triagem ', 1),
(184, 4, 10, 1, '2022-09-29 00:00:00', 'o computador esta desligando sosinho', 'verificamos o equipamento e realizamos a troca do mesmo ', 1),
(185, 4, 18, 10, '2022-09-29 00:00:00', 'a impressora não esta imprimindo de nenhuma maquina da recepçãO', 'VERIFICAMOS E FOI NECESSARIO REINICIAR O SWITH', 1),
(186, 4, 9, 24, '2022-09-29 00:00:00', 'TEM DUAS MAQUINAS NA TRIAGEM QUE NÃO ESTÃO FUNCIONADO INTERNET', 'VERIFICAMOS E FOI FEITO UMA ADAPTAÇÃO NO CABEAMENTO ', 1),
(187, 1, 19, 14, '2022-10-03 00:00:00', 'Impressões saindo com falhas', 'Toner substituído no setor', 1),
(188, 1, 17, 14, '2022-10-03 00:00:00', 'Trocar toner na impressora da recepção ', 'Toner trocado conforme solicitado ', 1),
(189, 1, 5, 14, '2022-10-03 00:00:00', 'Trocar o toner na qualidade ', 'Toner substituído ', 1),
(190, 1, 23, 12, '2022-10-03 00:00:00', 'Criar um novo usuário para enfermeira que irá cobrir licença maternidade de outra colaboradora', 'Usuário e máquina configurados', 1),
(191, 1, 30, 22, '2022-10-03 00:00:00', 'Pastas de rede não estão abrindo ', 'Serviço de rede corrigido ', 1),
(192, 1, 17, 10, '2022-10-03 00:00:00', 'pc do agendamento sem conexão', 'switch de rede reiniciado e conexão normalizada', 1),
(193, 4, 39, 5, '2022-10-04 00:00:00', 'acompanhamento e nova infra de rede e telefonia da psicologia', 'tarefas realizadas com sucesso', 1),
(194, 4, 11, 4, '2022-10-04 00:00:00', 'maquina da soroterapia não está imprimindo', 'compartilhada a impressora da emergência com soroterapia', 1),
(195, 1, 22, 4, '2022-10-04 00:00:00', 'Cópias frente e verso com problema ', 'Equipamento verificado e operando normalmente ', 1),
(196, 1, 45, 4, '2022-10-04 00:00:00', 'Impressora travando ', 'Após reiniciar o equipamento ficou funcionando perfeitamente ', 1),
(197, 1, 15, 15, '2022-10-05 00:00:00', 'Configurar pasta de rede no scanner ', 'Configuração realizada ', 1),
(198, 1, 27, 4, '2022-10-05 00:00:00', 'Configurar impressora da enfermaria a/B no PC da enfermaria C', 'Impressora compartilhada conforme solicitado ', 1),
(199, 4, 19, 1, '2022-10-05 00:00:00', 'Computador não estava ligando.', 'Realizado uma limpeza nas memórias Ram e computador voltou a ligar normalmente', 1),
(200, 4, 16, 2, '2022-10-06 00:00:00', 'Computador não conecta na internet', 'verificado o cabo de conexão e alterado o ponto de acesso.', 1),
(201, 4, 45, 14, '2022-10-10 00:00:00', 'Impressora acabou a tinta', 'Efetuada a troc do tonner', 1),
(202, 4, 26, 14, '2022-10-10 00:00:00', 'Tinta da impressora na sala de ortopedia acabou', 'Efetuada troca', 1),
(203, 4, 26, 24, '2022-10-07 00:00:00', 'Cabos Estavam Desorganizados', 'Realizada a organização da mesa e dos cabos', 1),
(204, 4, 19, 24, '2022-10-10 00:00:00', 'Mudança de sala ... necessario realizar instalação de cabos', 'Pontos de Redes instalados cabeamento concluido', 1),
(205, 4, 45, 21, '2022-10-11 00:00:00', 'por favor montar o computador que veio da coordenação para o Plantão', 'MONTAGEM DE PC VINDO DA COORDENAÇÃO DE ENFERMAGEM PARA O PLANTÃO, E INFRAestrutura DE REDE PARA O FUNCIONAMENTO', 1),
(206, 1, 19, 13, '2022-10-07 00:00:00', 'Auxiliar na atualização do Sisaih01 ', 'PC da coordenação atualizado com sucesso ', 1),
(207, 1, 16, 2, '2022-10-10 00:00:00', 'Verificar a Internet que oscila e para de funcionar ', 'Aparentemente o cabeamento está ok mesmo assim foi feito outro caminho para chegar sinal de rede e Internet no setor ', 1),
(208, 1, 27, 15, '2022-10-11 00:00:00', 'Transferir alguns arquivos do PC que está no plantão para o PC da coordenação de enfermagem ', 'Arquivos solicitados copiados e transferidos para o PC da coordenação ', 1),
(209, 4, 45, 14, '2022-10-11 00:00:00', 'Impressora está sem tinta', 'rEALIZADO A tROCA DE tONNER', 1),
(210, 1, 10, 1, '2022-10-12 00:00:00', 'Médica não consegue acessar o computador ', 'Após verificação foi notada falha de relação de confiança entre PC e servidor na rede, o ajuste foi feito e PC de volta ao normal ', 1),
(211, 4, 29, 14, '2022-10-13 00:00:00', 'Impressora sem tinta', 'realizada a troca de tonner', 1),
(212, 4, 29, 2, '2022-10-13 00:00:00', 'Estamos sem acesso a Internet', 'Realizado o reparo no cabo conexão retornou', 1),
(214, 4, 4, 19, '2022-10-13 00:00:00', 'Prefeitura realizou uma verificação dos equipamentos do Servidor', 'realizado acompanhamento do processo', 1),
(215, 4, 26, 2, '2022-10-17 00:00:00', 'Estamos Sem internet no Raio X', 'Feito uma verificação realizado uma troca de cabos conexão retornou', 1),
(216, 1, 45, 2, '2022-10-17 00:00:00', 'FAvor verificar a Internet da soroterapia 2', 'Cabeamento verificado, rede e Internet de volta ao normal ', 1),
(217, 1, 45, 18, '2022-10-17 00:00:00', 'Ponto de rede do computador da sutura está desconectando sozinho', 'Refeito o conector do cabo do PC informado, Internet de volta ', 1),
(218, 1, 45, 1, '2022-10-17 00:00:00', 'PC do consultório 6 não está ligando ', 'Equipamento desligado na régua de alimentação ', 1),
(219, 1, 40, 3, '2022-10-14 00:00:00', 'Sinal de wifi da farmácia com problemas ', 'Roteador retirado para reconfigurar e ficou ok', 1),
(220, 4, 14, 4, '2022-10-17 00:00:00', 'Impressora não está funcionando', 'Realizado uma verificação e impressora estava desconectada.\r\nconexão com impressora estabelecida e funcionando corretamente.', 1),
(221, 4, 11, 2, '2022-10-18 00:00:00', 'Soroterapia: estamos sem conexão com a internet', 'realizado uma troca de keystone conexão retornou', 1),
(222, 4, 11, 4, '2022-10-18 00:00:00', 'Impressora não esta conectada na máquina da Soroterapia', 'realizada a configuração de conexão com a impressora', 1),
(223, 4, 18, 2, '2022-10-18 00:00:00', 'estamos sem internet em uma máquina', 'realizado uma verificação e feita uma crimpagem de cabo.', 1),
(224, 1, 23, 12, '2022-10-18 00:00:00', 'Por favor criar novo usuário para a nova colaboradora do setor', 'usuário craido para acesso ao pc e configuração feita no computador', 1),
(225, 1, 27, 12, '2022-10-17 00:00:00', 'criar usuário para a enfermeira jessica da coordenação', 'usuário criado e arquivos copiados para a nova área de trabalho', 1),
(226, 1, 26, 2, '2022-10-17 00:00:00', 'sinal de internet parou no setor por volta das 23h por favor verificar', 'após analisar por chamada de vídeo notamos um mal funcionamento do switch que distribui a rede no raio x', 1),
(227, 1, 45, 4, '2022-10-14 00:00:00', 'por favor instalar a impressora do plantão no novo pc so setor', 'impressora configurada com sucesso', 1),
(228, 1, 45, 14, '2022-10-14 00:00:00', 'levar toner reserva para o plantão adm poder trocar no final de semana caso haja necessidade', 'foram deixados 2 toners no plantão adm', 1),
(229, 1, 26, 2, '2022-10-14 00:00:00', 'setor do raio x sem internet', 'verificados os cabos e sinal de internet ok ', 1),
(230, 4, 14, 4, '2022-10-19 00:00:00', 'Impressora esta dando erro de obstrução', 'Realizada uma verificação na Impressora e reiniciado Computador .\r\nImpressora voltou a funcionar normalmente ', 1),
(231, 4, 28, 13, '2022-10-20 00:00:00', 'Não estou conseguindo acessar meu cadastro no One Laudos', 'Realizada uma verificação e corrigido o dado incorreto da senha', 1),
(232, 4, 28, 17, '2022-10-20 00:00:00', 'Não recordo minha Senha do Salutem', 'realizado um reset de senha', 1),
(233, 4, 28, 11, '2022-10-21 00:00:00', 'Excel não está abrindo ', 'realizado a instalação do pacote office', 1),
(234, 4, 28, 13, '2022-10-21 00:00:00', 'Salutem não esta carregando', 'realizado uma verificação de rede e pagina reaberta funcionando normalmente', 1),
(235, 4, 22, 12, '2022-10-24 00:00:00', 'não estamos conseguindo juntar os documentos scaneados', 'apresentada uma segunda alternativa para poderem unir os arquivos em formato pdf', 1),
(236, 4, 26, 14, '2022-10-24 00:00:00', 'Impressão na sala de ortopedia está saindo fraca!', 'realizado uma troca de tonner', 1),
(237, 1, 35, 13, '2022-10-24 00:00:00', 'Favor liberar acesso à Internet para os usuários do sistema de satisfação de atendimento ', 'Acesso liberado nos notebooks dos usuários informados', 1),
(238, 1, 35, 24, '2022-10-24 00:00:00', 'Acompanhar a apresentação do sistema de satisfação de atendimento ', 'Treinamento acompanhado conforme solicitação ', 1),
(239, 1, 32, 12, '2022-10-24 00:00:00', 'Documento do Word não imprime, favor verificar ', 'Documento convertido para PDF e impressão ocorreu sem problemas ', 1),
(240, 1, 40, 13, '2022-10-21 00:00:00', 'Montar sala de apresentação do novo sistema na farmácia ', 'Sala montada e colaboradores com acesso à apresentação ', 1),
(241, 1, 3, 13, '2022-10-21 00:00:00', 'Montar sala de apresentação do novo sistema no Almoxarifado ', 'Sala acessada e colaboradores do setor acompanhando a apresentação ', 1),
(242, 1, 3, 13, '2022-10-21 00:00:00', 'Montar sala de apresentação do novo sistema no Almoxarifado ', 'Sala acessada e colaboradores do setor acompanhando a apresentação ', 1),
(243, 1, 26, 24, '2022-10-21 00:00:00', 'Por gentileza verificar se está tudo certo com o cabeamento da sala do raio X pois de vez em quando acontece a desconexão de algum equipamento ', 'Cabeamento verificado e substituída uma parte, rede funcionando normalmente ', 1),
(244, 1, 27, 2, '2022-10-21 00:00:00', 'Computador do anfiteatro sem conexão com a Internet, haverá um treinamento com a enfermagem ', 'Ponto de rede verificado e feita a devida correção ', 1),
(245, 4, 40, 14, '2022-10-25 00:00:00', 'Impressora esta imprimindo em branco', 'realizada uma troca de tonner', 1),
(246, 1, 18, 9, '2022-10-26 00:00:00', 'Por favor verificar o monitor da ortopedia ', 'Monitor verificado, o ortopedista informou que o problema acontece. Na geração de vídeo e que pode ser no PC, assim que possível trocaremos a CPU. ', 1),
(247, 4, 18, 14, '2022-10-27 00:00:00', 'Impressora não está imprimindo corretamente', 'Realizada a Troca de Tonner', 1),
(248, 4, 10, 14, '2022-10-27 00:00:00', 'Impressora da Recepção do PS não está imprimindo corretamente', 'Realizada uma troca de tonner', 1),
(249, 4, 10, 4, '2022-10-27 00:00:00', 'Impressora não está funcionando', 'Realizado uma verificação na impressora e feito uma organização nas Folhas para impressão.\r\nImpressora funcionando corretamente', 1),
(250, 1, 27, 1, '2022-10-27 00:00:00', 'computador da enfermaria e não está ligando, luz do power fica piscando', 'foi realizada a limpeza das memórias e pc voltou ao normal', 1),
(251, 1, 19, 5, '2022-10-26 00:00:00', 'faturamento irá para a nova sala, e será necessário acompanhamento', 'mudança realizada com sucesso', 1),
(252, 1, 15, 1, '2022-10-26 00:00:00', 'configurar o pc da sala da fernanda para a natalia regina pois ela ficará responsável pelas atribuições da divisão médica', 'configuração feita conforme a solicitação da colaboradora', 1),
(253, 1, 31, 14, '2022-10-26 00:00:00', 'por favor trocar o toner da prescição médica', 'toner substituído', 1),
(254, 4, 12, 4, '2022-10-27 00:00:00', 'Impressora está com um papel atolado', 'Realizado a remoção da obstrução na impressora', 1),
(255, 4, 39, 28, '2022-10-27 00:00:00', 'Sala da odontologia (Sala mais próxima é a psicologia) esta sem computador', 'realizado a instalação dos equipamentos .', 1),
(256, 4, 22, 12, '2022-10-28 00:00:00', 'Não estou conseguindo acessar o Sisreg', 'passadas as orientações para o acesso.', 1),
(257, 4, 11, 28, '2022-10-28 00:00:00', 'uma das salas de soroterapia está sem máquina', 'realizado a instalação dos equipamentos .', 1),
(258, 4, 11, 2, '2022-10-31 00:00:00', 'Estamos Sem Conexão na Soroterapia 1', 'realizado uma troca de porta.. Conexão retornou', 1),
(259, 4, 27, 14, '2022-10-31 00:00:00', 'impressora da enfermaria a/b está sem tinta', 'realizado a troca de tonner', 1),
(260, 4, 10, 14, '2022-10-31 00:00:00', 'Impressora do consultório 6 está sem tinta', 'Realizado uma troca de tonner', 1),
(261, 4, 19, 24, '2022-11-01 00:00:00', 'umas das máquinas está oscilando', 'realizado um reparo no cabeamento', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `nome`, `cargo`) VALUES
(1, 'admin', '1234', 'marcelo nazaro', 2),
(3, 'almoxarifado', '123', 'fabio ferreira', 0),
(4, 'ti', '1234', 'LUAN silva', 1),
(5, 'qualidade', '123', 'qualidade', 0),
(6, 'nir', '123', 'nir', 0),
(7, 'cme', '123', 'cme', 0),
(8, 'patrimonio', '123', 'patrimonio', 0),
(9, 'triagem', '123', 'triagem', 0),
(10, 'pronto socorro', '123', 'pronto socorro', 0),
(11, 'emergencia', '123', 'emergencia', 0),
(12, 'assist. social', '123', 'assitencia social', 0),
(13, 'one laudos', '123', 'one laudos', 0),
(14, 'rh', '123', 'recursos humanos', 0),
(15, 'divisao medica', '123', 'divisao medica', 0),
(16, 'higienização', '123', 'higienização', 0),
(17, 'ambulatorio', '123', 'ambulatorio', 0),
(18, 'recepção central', '123', 'recepção central', 0),
(19, 'faturamento', '123', 'faturamento', 0),
(20, 'compras', '123', 'comprAS', 0),
(21, 'centro cirurgico', '123', 'centro cirurgico', 0),
(22, 'same', '123', 'same', 0),
(23, 'scih', '123', 'scih', 0),
(24, 'eletro encefalo', '123', 'eletro encefalo', 0),
(25, 'educação continuada', '123', 'educação continuada', 0),
(26, 'raio x', '123', 'raio x', 0),
(27, 'enfermagem', '123', 'enfermagem', 0),
(28, 'coreme', '123', 'coreme', 0),
(29, 'uti', '123', 'uti', 0),
(30, 'prefeitura', '123', 'prefeitura', 0),
(31, 'prescrição', '123', 'prescrição', 0),
(32, 'diretoria tecnica', '123', 'diretoria tecnica', 0),
(33, 'sesmit', '123', 'sesmit', 0),
(34, 'nutrição', '123', 'nutrição', 0),
(35, 'gerência assistencial', '123', 'GERÊNCIA ASSISTENCIAL', 0),
(36, 'sala de coleta', '123', 'SALA DE COLETA', 0),
(37, 'Segurança ', '123', 'Segurança ', 0),
(38, 'PATRI', '1234', 'JULIA', 0),
(39, 'Psicologia ', '123', 'Psicologia ', 0),
(40, 'farmacia', '123', 'farmacia', 0),
(42, 'Diretoria geral', '123', 'Diretoria geral', 0),
(43, 'sau', '123', 'sau', 0),
(44, 'Sala de gesso', '123', 'Sala de gesso', 0),
(45, 'plantão adm', '123', 'plantão adm', 0),
(46, 'Manutenção', '123', 'Manutenção ', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ativos`
--
ALTER TABLE `ativos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ativos`
--
ALTER TABLE `ativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
