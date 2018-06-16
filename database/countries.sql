-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 16 2018 г., 20:41
-- Версия сервера: 10.2.10-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `freelance`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `title_ru` varchar(60) DEFAULT NULL,
  `title_ua` varchar(60) DEFAULT NULL,
  `title_be` varchar(60) DEFAULT NULL,
  `title_en` varchar(60) DEFAULT NULL,
  `title_es` varchar(60) DEFAULT NULL,
  `title_pt` varchar(60) DEFAULT NULL,
  `title_de` varchar(60) DEFAULT NULL,
  `title_fr` varchar(60) DEFAULT NULL,
  `title_it` varchar(60) DEFAULT NULL,
  `title_pl` varchar(60) DEFAULT NULL,
  `title_ja` varchar(60) DEFAULT NULL,
  `title_lt` varchar(60) DEFAULT NULL,
  `title_lv` varchar(60) DEFAULT NULL,
  `title_cz` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `title_ru`, `title_ua`, `title_be`, `title_en`, `title_es`, `title_pt`, `title_de`, `title_fr`, `title_it`, `title_pl`, `title_ja`, `title_lt`, `title_lv`, `title_cz`) VALUES
(1, 'Кыргызстан', 'Киргизстан', 'Кыргызтан', 'Kyrgyzstan', 'Kirguistán', 'Quirguistão', 'Kirgisistan', 'Kirghizstan', 'Kyrgyzstan', 'Kirgistan', 'キルギスタン', 'Kirgizija', 'Kirgizstāna', 'Kyrgyzstán'),
(2, 'Казахстан', 'Казахстан', 'Казахстан', 'Kazakhstan', 'Kazajistán', 'Cazaquistão', 'Kasachstan', 'Kazakhstan', 'Kazakistan', 'Kazachstan', 'カザフスタン', 'Kazachstanas', 'Kazahstāna', 'Kazachstán'),
(3, 'Россия', 'Росiя', 'Расея', 'Russia', 'Rusia', 'Rússia', 'Russland', 'Russie', 'Russia', 'Rosja', 'ロシア', 'Rusija', 'Krievija', 'Rusko'),
(4, 'Таджикистан', 'Таджикистан', 'Таджыкістан', 'Tajikistan', 'Tadjikistán', 'Tadjiquistão', 'Tadschikistan', 'Tadjikistan', 'Tajikistan', 'Tadżykistan', 'タジキスタン', 'Tadžikistanas', 'Tadžikistāna', 'Tádžikistán'),
(5, 'Узбекистан', 'Узбекистан', 'Узбэкістан', 'Uzbekistan', 'Uzbekistán', 'Uzbequistão', 'Usbekistan', 'Ouzbékistan', 'Uzbekistan', 'Uzbekistan', 'ウズベキスタン', 'Uzbekistanas', 'Uzbekistāna', 'Uzbekistán'),
(6, 'Австралия', 'Австралiя', 'Аўстралія', 'Australia', 'Australia', 'Austrália', 'Australien', 'Australie', 'Australia', 'Australia', 'オーストラリア', 'Australija', 'Austrālija', 'Austrálie'),
(7, 'Австрия', 'Австрiя', 'Аўстрыя', 'Austria', 'Austria', 'Áustria', 'Österreich', 'Autriche', 'Austria', 'Austria', 'オーストリア', 'Austrija', 'Austrija', 'Rakousko'),
(8, 'Азербайджан', 'Азербайджан', 'Азэрбайджан', 'Azerbaijan', 'Azerbaiyán', 'Azerbaijão', 'Aserbaidschan', 'Azerbaïdjan', 'Azerbaijan', 'Azerbejdżan', 'アゼルバイジャン', 'Azerbaidžanas', 'Azerbaidžāna', 'Ázerbajdžán'),
(9, 'Албания', 'Албанiя', 'Альбанія', 'Albania', 'Albania', 'Albânia', 'Albanien', 'Albanie', 'Albania', 'Albania', 'アルバニア', 'Albanija', 'Albānija', 'Albánie'),
(10, 'Алжир', 'Алжир', 'Альжыр', 'Algeria', 'Argelia', 'Argélia', 'Algerien', 'Algérie', 'Algeria', 'Algeria', 'アルジェリア', 'Alžyras', 'Alžīrija', 'Alžírsko'),
(11, 'Американское Самоа', 'Американське Самоа', 'Амэрыканскае Самоа', 'American Samoa', 'Samoa Americana', 'Samoa Americana', 'Amerikanisch Samoa', 'Samoa américaines', 'Samoa Americana', 'Samoa Amerykańskie', 'アメリカ領サモア', 'Amerikos Samoa', 'Amerikas Samoa', 'Americká Samoa'),
(12, 'Ангилья', 'Ангілья', 'Анґілья', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'Anguilla', 'アンギラ', 'Angilija', 'Angilja', 'Anguilla'),
(13, 'Ангола', 'Ангола', 'Ангола', 'Angola', 'Angola', 'Angola', 'Angola', 'Angola', 'Angola', 'Angola', 'アンゴラ', 'Angola', 'Angola', 'Angola'),
(14, 'Андорра', 'Андорра', 'Андора', 'Andorra', 'Andorra', 'Andorra', 'Andorra', 'Andorre', 'Andorra', 'Andorra', 'アンドラ', 'Andora', 'Andora', 'Andorra'),
(15, 'Антигуа и Барбуда', 'Антiгуа i Барбуда', 'Антыгуа і Барбуда', 'Antigua and Barbuda', 'Antigua y Barbuda', 'Antígua e Barbuda', 'Antigua und Barbuda', 'Antigua et Barbuda', 'Antigua e Barbuda', 'Antigua i Barbuda', 'アンティグア・バーブーダ', 'Antikva ir Barbuda', 'Antigva un Barbuda', 'Antigua a Barbuda'),
(16, 'Аргентина', 'Аргентина', 'Аргентына', 'Argentina', 'Argentina', 'Argentina', 'Argentinien', 'Argentine', 'Argentina', 'Argentyna', 'アルゼンチン', 'Argentina', 'Argentīna', 'Argentina'),
(17, 'Армения', 'Вiрменiя', 'Арменія', 'Armenia', 'Armenia', 'Arménia', 'Armenien', 'Arménie', 'Armenia', 'Armenia', 'アルメニア', 'Armėnija', 'Armēnija', 'Arménie'),
(18, 'Аруба', 'Аруба', 'Аруба', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'Aruba', 'アルバ', 'Aruba', 'Aruba', 'Aruba'),
(19, 'Афганистан', 'Афганiстан', 'Аўганістан', 'Afghanistan', 'Afganistán', 'Afeganistão', 'Afghanistan', 'Afghanistan', 'Afghanistan', 'Afganistan', 'アフガニスタン', 'Afganistanas', 'Afganistāna', 'Afghánistán'),
(20, 'Багамы', 'Багами', 'Багамы', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahamas', 'Bahama', 'バハマ', 'Bahamai', 'Bahamu salas', 'Bahamy'),
(21, 'Бангладеш', 'Бангладеш', 'Бангладэш', 'Bangladesh', 'Bangladesh', 'Bangladesh', 'Bangladesch', 'Bengladesh', 'Bangladesh', 'Bangladesz', 'バングラディシュ', 'Bangladešas', 'Bangladeša', 'Bangladéš'),
(22, 'Барбадос', 'Барбадос', 'Барбадос', 'Barbados', 'Barbados', 'Barbados', 'Barbados', 'Barbades', 'Barbados', 'Barbados', 'バルバドス', 'Barbadosas', 'Barbadosa', 'Barbados'),
(23, 'Бахрейн', 'Бахрейн', 'Бахрэйн', 'Bahrain', 'Bahréin', 'Bahrein', 'Bahrain', 'Bahreïn', 'Bahrain', 'Bahrain', 'バーレーン', 'Bahreinas', 'Bahreina', 'Bahrajn'),
(24, 'Беларусь', 'Бiлорусь', 'Беларусь', 'Belarus', 'Bielorrusia', 'Bielorrússia', 'Weißrussland', 'Belorus', 'Bielorussia', 'Białoruś', 'ベラルーシ', 'Baltarusija', 'Baltkrievija', 'Bělorusko'),
(25, 'Белиз', 'Белiз', 'Бэліз', 'Belize', 'Belice', 'Belize', 'Belize', 'Bélize', 'Belize', 'Belize', 'ベリーズ', 'Belizas', 'Belīza', 'Belize'),
(26, 'Бельгия', 'Бельгiя', 'Бэльгія', 'Belgium', 'Bélgica', 'Bélgica', 'Belgien', 'Belgique', 'Belgio', 'Belgia', 'ベルギー', 'Belgija', 'Beļģija', 'Belgie'),
(27, 'Бенин', 'Бенiн', 'Бэнін', 'Benin', 'Benín', 'Benin', 'Benin', 'Bénin', 'Benin', 'Benin', 'ベナン', 'Beninas', 'Benīna', 'Benin'),
(28, 'Бермуды', 'Бермуди', 'Бэрмуды', 'Bermuda', 'Bermudas', 'Bermudas', 'Bermudas', 'Bermudes', 'Bermuda', 'Bermudy', 'バミューダ', 'Bermudai', 'Bermudu salas', 'Bermudské ostrovy'),
(29, 'Болгария', 'Болгарiя', 'Баўгарыя', 'Bulgaria', 'Bulgaria', 'Bulgária', 'Bulgarien', 'Bulgarie', 'Bulgaria', 'Bułgaria', 'ブルガリア', 'Bulgarija', 'Bulgārija', 'Bulharsko'),
(30, 'Боливия', 'Болiвiя', 'Балівія', 'Bolivia', 'Bolivia', 'Bolívia', 'Bolivien', 'Bolivie', 'Bolivia', 'Boliwia', 'ボリビア', 'Bolivija', 'Bolīvija', 'Bolívie'),
(31, 'Бонайре, Синт-Эстатиус и Саба', 'Бонайре, Сінт-Естатіус і Саба', 'Банайрэ, Сінт-Эстатыюс і Саба', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, San Eustaquio y Saba', 'Bonaire, Santo Eustáquio e Saba ', 'Bonaire, Sint Eustatius und Saba', 'Bonaire, Saint-Eustache et Saba', 'Bonaire, Sint Eustatius e Saba', 'Bonaire, Sint Eustatius i Saba', 'BES諸島', 'Bonairė, Sint Estatijus ir Saba', 'Bonaire, Sint Eustatius and Saba', 'Karibské Nizozemsko'),
(32, 'Босния и Герцеговина', 'Боснiя i Герцеговина', 'Босьнія й Герцаґавіна', 'Bosnia and Herzegovina', 'Bosnia y Herzegovina', 'Bósnia e Herzegovina', 'Bosnien-Herzegowina', 'Bosnie Herzégovine', 'Bosnia Herzegovina', 'Bośnia and Herzegowina', 'ボスニア・ヘルツェゴビナ', 'Bosnija ir Hercegovina', 'Bosnija un Hercogovīna', 'Bosna a Hercegovina'),
(33, 'Ботсвана', 'Ботсвана', 'Батсвана', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'Botswana', 'ボツワナ', 'Botsvana', 'Botstvana', 'Botswana'),
(34, 'Бразилия', 'Бразилiя', 'Бразылія', 'Brazil', 'Brasil', 'Brasil', 'Brasilien', 'Brésil', 'Brasile', 'Brazylia', 'ブラジル', 'Brazilija', 'Brazīlija', 'Brazílie'),
(35, 'Бруней-Даруссалам', 'Бруней-Дарусалам', 'Брунэй-Дарусалам', 'Brunei Darussalam', 'Brunéi', 'Brunei Darussalam', 'Brunei Darussalam', 'Bruneï', 'Brunei Darussalam', 'Brunei', 'ブルネイ・ダルサラーム', 'Brunėjaus Dar Es Salamas', 'Bruneja', 'Brunej'),
(36, 'Буркина-Фасо', 'Буркина-Фасо', 'Буркіна-Фасо', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 'ブルキナファソ', 'Burkina Faso', 'Burkinafaso', 'Burkina Faso'),
(37, 'Бурунди', 'Бурундi', 'Бурундзі', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'Burundi', 'ブルンジ', 'Burundis', 'Burundi', 'Burundi'),
(38, 'Бутан', 'Бутан', 'Бутан', 'Bhutan', 'Bután', 'Butão', 'Bhutan', 'Bouthan', 'Bhutan', 'Bhutan', 'ブータン', 'Butanas', 'Butāna', 'Bhútán'),
(39, 'Вануату', 'Вануату', 'Вануату', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'Vanuatu', 'バヌアツ', 'Vanuatu', 'Vanuatu', 'Vanuatu'),
(40, 'Ватикан', 'Ватикан', 'Ватыкан', 'Vatican', 'Vaticano', 'Vaticano', 'Vatikan', 'Vatican', 'Vaticano', 'Watykan', 'ヴァチカン', 'Vatikanas', 'Vatican', 'Vatikán'),
(41, 'Великобритания', 'Великобританiя', 'Вялікабрытанія', 'United Kingdom', 'Gran Bretaña', 'Reino Unido', 'Großbritannien', 'Grande-Bretagne', 'Regno Unito', 'Wielka Brytania', 'イギリス', 'Didžioji Britanija', 'Apvienotā Karaliste', 'Velká Británie'),
(42, 'Венгрия', 'Угорщина', 'Вугоршчына', 'Hungary', 'Hungría', 'Hungria', 'Ungarn', 'Hongrie', 'Ungheria', 'Węgry', 'ハンガリー', 'Vengrija', 'Ungārija', 'Maďarsko'),
(43, 'Венесуэла', 'Венесуела', 'Вэнэсуэла', 'Venezuela', 'Venezuela', 'Venezuela', 'Venezuela', 'Vénézuela', 'Venezuela', 'Wenezuela', 'ベネズエラ', 'Venesuela', 'Venesuela', 'Venezuela'),
(44, 'Виргинские острова, Британские', 'Вiргiнськi острови, Британськi', 'Віргінскія выспы, Брытанскія', 'British Virgin Islands', 'Islas Vírgenes Británicas', 'Ilhas Virgens Britânicas', 'Britische Jungferninseln', 'Iles Vierges Britanniques', 'Isole Virgin Britanniche', 'Brytyjskie Wyspy Dziewicze', 'イギリス領ヴァージン諸島', 'Mergelių salos, Didžioji Britanija', 'Virdžīnijas salas, Apvienotā Karaliste', 'Britské Panenské ostrovy'),
(45, 'Виргинские острова, США', 'Вiргiнськi острови, США', 'Віргінскія выспы, ЗША', 'US Virgin Islands', 'Islas Virginia (EE.UU.)', 'Ilhas Virgens Americanas', 'US Jungferninseln', 'Iles Vierges Américaines', 'Isole Virgin degli Stati Uniti', 'Amerykańskie Wyspy Dziewicze', 'アメリカ領ヴァージン諸島', 'Mergelių salos, JAV', 'Virdžīnijas salas, ASV', 'Americké Panenské ostrovy'),
(46, 'Восточный Тимор', 'Схiдний Тимор', 'Усходні Тымор', 'East Timor', 'Timor Oriental', 'Timor-Leste', 'Ost Timor', 'Timor oriental', 'Timor Est', 'Wschodni Timor', '東ティモール', 'Rytų Timoras', 'Austrumu Timora', 'Východní Timor'),
(47, 'Вьетнам', 'Вєтнам', 'Віетнам', 'Vietnam', 'Vietnam', 'Vietname', 'Vietnam', 'Vietnam', 'Vietnam', 'Wietnam', 'ヴェトナム', 'Vietnamas', 'Vjetnama', 'Vietnam'),
(48, 'Габон', 'Габон', 'Габон', 'Gabon', 'Gabón', 'Gabão', 'Gabon', 'Gabon', 'Gabon', 'Gabon', 'ガボン', 'Gabonas', 'Gabona', 'Gabon'),
(49, 'Гаити', 'Гаїтi', 'Гаіці', 'Haiti', 'Haití', 'Haiti', 'Haiti', 'Haïti', 'Haiti', 'Haiti', 'ハイチ', 'Haitis', 'Haiti', 'Haiti'),
(50, 'Гайана', 'Гайана', 'Гаяна', 'Guyana', 'Guyana', 'Guiana', 'Guyana', 'Guyana', 'Guyana', 'Gujana', 'ガイアナ', 'Gajana', 'Gajana', 'Guyana'),
(51, 'Гамбия', 'Гамбiя', 'Гамбія', 'Gambia', 'Gambia', 'Gâmbia', 'Gambia', 'Gambie', 'Gambia', 'Gambia', 'ガンビア', 'Gambija', 'Gambija', 'Gambie'),
(52, 'Гана', 'Гана', 'Гана', 'Ghana', 'Ghana', 'Gana', 'Ghana', 'Ghana', 'Ghana', 'Ghana', 'ガーナ', 'Gana', 'Gana', 'Ghana'),
(53, 'Гваделупа', 'Гваделупа', 'Ґўадэлюпа', 'Guadeloupe', 'Guadalupe (Francia)', 'Guadalupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 'Guadeloupa', 'グアドループ', 'Gvadelupa', 'Gvadelupa', 'Guadeloupe'),
(54, 'Гватемала', 'Гватемала', 'Гватэмала', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'Guatemala', 'グアテマラ', 'Gvatemala', 'Gvatemala', 'Guatemala'),
(55, 'Гвинея', 'Гвiнея', 'Гвінэя', 'Guinea', 'Guinea', 'Guiné', 'Guinea', 'Guinée', 'Guinea', 'Gwinea', 'ギニア', 'Gvinėja', 'Gvineja', 'Guinea'),
(56, 'Гвинея-Бисау', 'Гвiнея-Бiсау', 'Гвінэя-Бісава', 'Guinea-Bissau', 'Guinea-Bissau', 'Guiné-Bissau', 'Guinea-Bissau', 'Guinée Bissau', 'Guinea-Bissau', 'Gwinea-Bissau', 'ギニア・ビサウ', 'Gvinėja Bisau', 'Gvineja-Bisava', 'Guinea-Bissau'),
(57, 'Германия', 'Нiмеччина', 'Нямеччына', 'Germany', 'Alemania', 'Alemanha', 'Deutschland', 'Allemagne', 'Germania', 'Niemcy', 'ドイツ', 'Vokietija', 'Vācija', 'Německo'),
(58, 'Гибралтар', 'Гiбралтар', 'Гібралтар', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibraltar', 'Gibilterra', 'Gibraltar', 'ジブラルタル', 'Gibraltaras', 'Gibraltāra', 'Gibraltar'),
(59, 'Гондурас', 'Гондурас', 'Гандурас', 'Honduras', 'Honduras', 'Gordura', 'Honduras', 'Honduras', 'Honduras', 'Honduras', 'ホンジュラス', 'Hondūras', 'Gondurasa', 'Honduras'),
(60, 'Гонконг', 'Гонконг', 'Ганконг', 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', 'Hong Kong', '香港', 'Honkongas', 'Gonkonga', 'Hongkong'),
(61, 'Гренада', 'Гренада', 'Грэнада', 'Grenada', 'Granada', 'Granada', 'Grenada', 'Grenade', 'Grenada', 'Grenada', 'グレナダ', 'Grenada', 'Granāda', 'Grenada'),
(62, 'Гренландия', 'Гренландiя', 'Грэнляндыя', 'Greenland', 'Groenlandia', 'Gronelândia<br>', 'Grönland', 'Groenland', 'Groenlandia', 'Grenlandia', 'グリーンランド', 'Grenlandija', 'Grenlande', 'Grónsko'),
(63, 'Греция', 'Грецiя', 'Грэцыя', 'Greece', 'Grecia', 'Grécia', 'Griechenland', 'Grèce', 'Grecia', 'Grecja', 'ギリシャ', 'Graikija', 'Grieķija', 'Řecko'),
(64, 'Грузия', 'Грузiя', 'Грузія', 'Georgia', 'Georgia', 'Geórgia', 'Georgien', 'Géorgie', 'Georgia', 'Gruzja', 'グルジア', 'Gruzija', 'Gruzija', 'Gruzie'),
(65, 'Гуам', 'Гуам', 'Гуам', 'Guam', 'Guam', 'Guam', 'Guam', 'Guam', 'Guam', 'Guam', 'グアム', 'Guamas', 'Guama', 'Guam'),
(66, 'Дания', 'Данiя', 'Данія', 'Denmark', 'Dinamarca', 'Dinamarca', 'Dänemark', 'Danemark', 'Danimarca', 'Dania', 'デンマーク', 'Danija', 'Dānija', 'Dánsko'),
(67, 'Джибути', 'Джiбутi', 'Джыбуці', 'Djibouti', 'Yibuti', 'Djibouti', 'Djibouti', 'Djibouti', 'Djibouti', 'Dżibuti', 'ジブチ', 'Džibutis', 'Džibuti', 'Džibutsko'),
(68, 'Доминика', 'Домiнiка', 'Дамініка', 'Dominica', 'Dominica', 'Dominica', 'Dominica', 'Dominique', 'Dominica', 'Dominika', 'ドミニカ', 'Dominika', 'Dominika', 'Dominika'),
(69, 'Доминиканская Республика', 'Домiнiканська Республiка', 'Дамініканская Рэспубліка', 'Dominican Republic', 'República Dominicana', 'República Dominicana', 'Dominikanische Republik', 'République dominicaine', 'Repubblica Domenicana', 'Dominikana', 'ドミニカ共和国', 'Dominikos Respublika', 'Dominikānas Republika', 'Dominikánská republika'),
(70, 'Египет', 'Єгипет', 'Эгіпэт', 'Egypt', 'Egipto', 'Egito', 'Ägypten', 'Egypte', 'Egitto', 'Egipt', 'エジプト', 'Egiptas', 'Ēģipte', 'Egypt'),
(71, 'Замбия', 'Замбiя', 'Замбія', 'Zambia', 'Zambia', 'Zâmbia', 'Sambia', 'Zambie', 'Egitto', 'Zambia', 'ザンビア', 'Zambija', 'Zambija', 'Zambie'),
(72, 'Западная Сахара', 'Захiдна Сахара', 'Заходняя Сахара', 'Western Sahara', 'Sáhara Occidental', 'Saara Ocidental', 'Westsahara', 'Sahara occidental', 'Sahara Occidentale', 'Sahara Zachodnia', '西サハラ', 'Vakarų Sachara', 'Rietumsahāra', 'Západní Sahara'),
(73, 'Зимбабве', 'Зiмбабве', 'Зімбабвэ', 'Zimbabwe', 'Zimbabue', 'Zimbabwe', 'Simbabwe', 'Zimbabwe', 'Zimbabwe', 'Zimbabwe', 'ジンバブエ', 'Zimbabvė', 'Zimbabve', 'Zimbabwe'),
(74, 'Израиль', 'Iзраїль', 'Ізраіль', 'Israel', 'Israel', 'Israel', 'Israel', 'Israël', 'Israele', 'Izrael', 'イスラエル', 'Izraelis', 'Izraela', 'Izrael'),
(75, 'Индия', 'Iндiя', 'Індыя', 'India', 'India', 'Índia', 'Indien', 'Inde', 'India', 'Indie', 'インド', 'Indija', 'Indija', 'Indie'),
(76, 'Индонезия', 'Iндонезiя', 'Інданэзія', 'Indonesia', 'Indonesia', 'Indonésia', 'Indonesien', 'Indonésie', 'Indonesia', 'Indonezja', 'インドネシア', 'Indonezija', 'Indonēzija', 'Indonésie'),
(77, 'Иордания', 'Йорданiя', 'Іярданія', 'Jordan', 'Jordania', 'Jordânia', 'Jordanien', 'Jordanie', 'Giordania', 'Jordania', 'ヨルダン', 'Jordanija', 'Jordānija', 'Jordánsko'),
(78, 'Ирак', 'Iрак', 'Ірак', 'Iraq', 'Irak', 'Iraque', 'Irak', 'Irak', 'Iraq', 'Irak', 'イラク', 'Irakas', 'Irāka', 'Irák'),
(79, 'Иран', 'Iран', 'Іран', 'Iran', 'Irán', 'Irão', 'Iran', 'Iran', 'Iran', 'Iran', 'イラン', 'Iranas', 'Irāna', 'Írán'),
(80, 'Ирландия', 'Iрландiя', 'Ірляндыя', 'Ireland', 'Irlanda', 'Irlanda', 'Irland', 'Irlande', 'Irlanda', 'Irlandia', 'アイルランド', 'Airija', 'Īrija', 'Irsko'),
(81, 'Исландия', 'Iсландiя', 'Ісьляндыя', 'Iceland', 'Islandia', 'Islândia', 'Island', 'Islande', 'Islanda', 'Islandia', 'アイスランド', 'Islandija', 'Īslande', 'Island'),
(82, 'Испания', 'Iспанiя', 'Гішпанія', 'Spain', 'España', 'Espanha', 'Spanien', 'Espagne', 'Spagna', 'Hiszpania', 'スペイン', 'Ispanija', 'Spānija', 'Španělsko'),
(83, 'Италия', 'Iталiя', 'Італія', 'Italy', 'Italia', 'Itália', 'Italien', 'Italie', 'Italia', 'Włochy', 'イタリア', 'Italija', 'Itālija', 'Itálie'),
(84, 'Йемен', 'Йемен', 'Емэн', 'Yemen', 'Yemen', 'Iémen', 'Jemen', 'Yémen', 'Yemen', 'Jemen', 'イエメン', 'Jemenas', 'Jemena', 'Jemen'),
(85, 'Кабо-Верде', 'Кабо-Верде', 'Каба-Вэрдэ', 'Cape Verde', 'Cabo Verde', 'Cabo Verde', 'Kap Verde', 'Cap Vert', 'Cabo Verde', 'Cape Verde', 'カーボベルデ', 'Žaliasis Kyšulys', 'Kaboverde', 'Kapverdy'),
(86, 'Камбоджа', 'Камбоджа', 'Камбоджа', 'Cambodia', 'Camboya', 'Camboja', 'Kambodscha', 'Cambodge', 'Cambogia', 'Kambodża', 'カンボジア', 'Kambodža', 'Kambodža', 'Kambodža'),
(87, 'Камерун', 'Камерун', 'Камэрун', 'Cameroon', 'Camerún', 'Camarões', 'Kamerun', 'Cameroun', 'Camerun', 'Kamerun', 'カメルーン', 'Kamerūnas', 'Kameruna', 'Kamerun'),
(88, 'Канада', 'Канада', 'Канада', 'Canada', 'Canadá', 'Canadá', 'Kanada', 'Canada', 'Canada', 'Kanada', 'カナダ', 'Kanada', 'Kanāda', 'Kanada'),
(89, 'Катар', 'Катар', 'Катар', 'Qatar', 'Qatar', 'Qatar', 'Katar', 'Qatar', 'Qatar', 'Katar', 'カタール', 'Kataras', 'Katāra', 'Katar'),
(90, 'Кения', 'Кенiя', 'Кенія', 'Kenya', 'Kenia', 'Quénia', 'Kenia', 'Kenya', 'Kenia', 'Kenia', 'ケニア', 'Kenija', 'Kēnija', 'Keňa'),
(91, 'Кипр', 'Кiпр', 'Кіпар', 'Cyprus', 'Chipre', 'Chipre', 'Zypern', 'Chypre', 'Cipro', 'Cypr', 'キプロス', 'Kipras', 'Kipra', 'Kypr'),
(92, 'Кирибати', 'Кiрiбатi', 'Кірыбаты', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'Kiribati', 'キリバス', 'Kiribatis', 'Ķiribati', 'Kiribati'),
(93, 'Китай', 'Китай', 'Кітай', 'China', 'China', 'China', 'China', 'Chine', 'Cina', 'Chiny', '中国', 'Kinija', 'Ķīna', 'Čína'),
(94, 'Колумбия', 'Колумбiя', 'Калюмбія', 'Colombia', 'Colombia', 'Colômbia', 'Kolumbien', 'Colombie', 'Colombia', 'Kolumbia', 'コロンビア', 'Kolumbija', 'Kolumbija', 'Kolumbie'),
(95, 'Коморы', 'Комори', 'Каморы', 'Comoros', 'Comoras', 'Comores', 'Komoren', 'Comores', 'Comoros', 'Komory', 'コモロ諸島', 'Komorai', 'Komoru salas', 'Komory'),
(96, 'Конго', 'Конго', 'Конга', 'Congo', 'Congo', 'Congo', 'Kongo', 'Congo', 'Congo', 'Kongo', 'コンゴ', 'Kongas', 'Kongo', 'Kongo (Brazzaville)'),
(97, 'Конго, демократическая республика', 'Конго, демократична республiка', 'Конга, дэмакратычная рэспубліка', 'Congo, Democratic Republic', 'República Democrática del Congo', 'República Democrática do Congo', 'Kongo, Demokratische Republik', 'République démocratique du Congo', 'Congo, Repubblica Democratica', 'Demokratyczna Republika Konga', 'コンゴ民主共和国', 'Kongo Demokratinė Respublika', 'Kongo Demokrātiskā Republika', 'Demokratická republika Kongo'),
(98, 'Коста-Рика', 'Коста-Рiка', 'Коста-Рыка', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'Costa Rica', 'コスタリカ', 'Kosta Rika', 'Kostarika', 'Kostarika'),
(99, 'Кот д`Ивуар', 'Кот-д\'iвуар', 'Кот д`Івуар', 'Côte d`Ivoire', 'Costa de Marfil', 'Costa do Marfim', 'Elfenbeinküste', 'Côte d\'Ivoire', 'Costa d\'Avorio', 'Wybrzeże Kości Słoniowej', 'コートジボアール', 'Dramblio Kaulo Krantas', 'Kotdivuāra', 'Pobřeží slonoviny'),
(100, 'Куба', 'Куба', 'Куба', 'Cuba', 'Cuba', 'Cuba', 'Kuba', 'Cuba', 'Cuba', 'Kuba', 'キューバ', 'Kuba', 'Kuba', 'Kuba'),
(101, 'Кувейт', 'Кувейт', 'Кувэйт', 'Kuwait', 'Kuwait', 'Kuwait<br>', 'Kuwait', 'Koweït', 'Kuwait', 'Kuwejt', 'クウェート', 'Kuveitas', 'Kuveita', 'Kuvajt'),
(102, 'Кюрасао', 'Кюрасао', 'Кюрасаа', 'Curaçao', 'Antillas Holandesas', 'Curaçao', 'Niederländische Antillen', 'Antilles Néerlandaises', 'Antille Olandesi', 'Curacao', 'キュラソー島', 'Kiurasao ', 'Nīderlandes Antilas', 'Curaçao'),
(103, 'Лаос', 'Лаос', 'Ляос', 'Laos', 'Laos', 'Laos', 'Laos', 'Laos', 'Laos', 'Laos', 'ラオス', 'Laosas', 'Laosa', 'Laos'),
(104, 'Латвия', 'Латвiя', 'Латвія', 'Latvia', 'Letonia', 'Letónia', 'Lettland', 'Lettonie', 'Lettonia', 'Łotwa', 'ラトヴィア', 'Latvija', 'Latvija', 'Lotyšsko'),
(105, 'Лесото', 'Лесото', 'Лесота', 'Lesotho', 'Lesoto', 'Lesoto', 'Lesotho', 'Leshoto', 'Lesotho', 'Lesotho', 'レソト', 'Lesotas', 'Lesoto', 'Lesotho'),
(106, 'Либерия', 'Лiберiя', 'Лібэрыя', 'Liberia', 'Liberia', 'Libéria', 'Liberia', 'Libéria', 'Liberia', 'Liberia', 'リベリア', 'Liberija', 'Libērija', 'Libérie'),
(107, 'Ливан', 'Лiван', 'Лібан', 'Lebanon', 'Líbano', 'Líbano', 'Libanon', 'Liban', 'Libano', 'Liban', 'レバノン', 'Libanas', 'Livāna', 'Libanon'),
(108, 'Ливия', 'Лiвiя', 'Лібія', 'Libya', 'Libia', 'Líbia', 'Libyen', 'Lybie', 'Libia', 'Libia', 'リビア', 'Libija ', 'Lībija', 'Lybie'),
(109, 'Литва', 'Литва', 'Летува', 'Lithuania', 'Lituania', 'Lituânia', 'Litauen', 'Lituanie', 'Lituania', 'Litwa', 'リトアニア', 'Lietuva', 'Lietuva', 'Litva'),
(110, 'Лихтенштейн', 'Лiхтенштейн', 'Ліхтэнштайн', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 'リヒテンシュタイン', 'Lichtenšteinas', 'Lihtenšteina', 'Lichtenštejnsko'),
(111, 'Люксембург', 'Люксембург', 'Люксэмбург', 'Luxembourg', 'Luxemburgo', 'Luxemburgo', 'Luxemburg', 'Luxembourg', 'Lussemburgo', 'Luxembourg', 'ルクセンブルク', 'Liuksemburgas', 'Luksemburga', 'Lucembursko'),
(112, 'Маврикий', 'Маврикiй', 'Маўрыцы', 'Mauritius', 'Mauricio', 'Maurícia', 'Mauritius', 'Maurice', 'Mauritius', 'Mauritius', 'モーリシャス', 'Mauricijus', 'Mavrikija', 'Mauricius'),
(113, 'Мавритания', 'Мавританiя', 'Маўрытанія', 'Mauritania', 'Mauritania', 'Mauritânia', 'Mauretanien', 'Mauritanie', 'Mauritania', 'Mauretania', 'モーリタニア', 'Mauritanija', 'Mavritānija', 'Mauritánie'),
(114, 'Мадагаскар', 'Мадагаскар', 'Мадагаскар', 'Madagascar', 'Madagascar', 'Madagáscar', 'Madagaskar', 'Madagascar', 'Madagascar', 'Madagaskar', 'マダガスカル', 'Madagaskaras', 'Madagaskāra', 'Madagaskar'),
(115, 'Макао', 'Макао', 'Макаа', 'Macau', 'Macao', 'Macau', 'Macao', 'Macao', 'Macao', 'Makao', 'マカオ', 'Macao', 'Makao', 'Macao'),
(116, 'Македония', 'Македонiя', 'Македонія', 'Macedonia', 'Macedonia', 'Macedónia', 'Mazedonien', 'Macédoine', 'Macedonia', 'Macedonia', 'マケドニア', 'Makedonija', 'Makedonija', 'Makedonie'),
(117, 'Малави', 'Малавi', 'Малаві', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'Malawi', 'マラウィ', 'Malavis<br>', 'Malavi', 'Malawi'),
(118, 'Малайзия', 'Малайзiя', 'Малайзія', 'Malaysia', 'Malasia', 'Malásia', 'Malaysia', 'Malaisie', 'Malesia', 'Malezja', 'マレーシア', 'Malaizija', 'Malaizija', 'Malajsie'),
(119, 'Мали', 'Малi', 'Малі', 'Mali', 'Mali', 'Mali', 'Mali', 'Mali', 'Mali', 'Mali', 'マリ', 'Malis', 'Mali', 'Mali'),
(120, 'Мальдивы', 'Мальдiви', 'Мальдывы', 'Maldives', 'Maldivas', 'Maldivas', 'Malediven', 'Maldives', 'Maldive', 'Malediwy', 'モルジブ', 'Maldyvai', 'Maldīvas', 'Maledivy'),
(121, 'Мальта', 'Мальта', 'Мальта', 'Malta', 'Malta', 'Malta', 'Malta', 'Malte', 'Malta', 'Malta', 'マルタ', 'Malta', 'Malta', 'Malta'),
(122, 'Марокко', 'Марокко', 'Марока', 'Morocco', 'Marruecos', 'Marrocos', 'Marokko', 'Maroc', 'Marocco', 'Maroko', 'モロッコ', 'Marokas', 'Maroka', 'Maroko'),
(123, 'Мартиника', 'Мартинiка', 'Мартыніка', 'Martinique', 'Martinica', 'Martinica', 'Martinique', 'Martinique', 'Martinique', 'Martynika', 'マルティニク', 'Martinika', 'Martinika', 'Martinik'),
(124, 'Маршалловы Острова', 'Маршаловi острови', 'Маршалавыя Выспы', 'Marshall Islands', 'Islas Marshall', 'Ilhas Marshall', 'Marshallinseln', 'Iles Marshall', 'Isole Marshall', 'Wyspy Marshalla', 'マーシャル諸島', 'Maršalų salos', 'Maršalu salas', 'Marhallovy ostrovy'),
(125, 'Мексика', 'Мексика', 'Мэксыка', 'Mexico', 'México', 'México', 'Mexiko', 'Mexique', 'Messico', 'Meksyk', 'メキシコ', 'Meksika', 'Meksika', 'Mexiko'),
(126, 'Микронезия, федеративные штаты', 'Мiкронезiя, федеративнi штати', 'Мікранэзія, фэдэратыўныя штаты', 'Micronesia', 'Estados Federados de Micronesia', 'Micronésia', 'Mikronesien', 'Etats fédérés de Micronésie', 'Micronesia', 'Mikronezja', 'ミクロネシア連邦', 'Mikronezijos Federacinės Valstijos', 'Mikronēzija', 'Mikronésie'),
(127, 'Мозамбик', 'Мозамбiк', 'Мазамбік', 'Mozambique', 'Mozambique', 'Moçambique', 'Mosambik', 'Mozambique', 'Mozambico', 'Mozambik', 'モザンビーク', 'Mozambikas', 'Mozambika', 'Mosambik'),
(128, 'Молдова', 'Молдова', 'Малдова', 'Moldova', 'Moldavia', 'Moldávia', 'Moldavien', 'Moldavie', 'Moldavia', 'Mołdawia', 'モルドバ', 'Moldova', 'Moldova', 'Moldavsko'),
(129, 'Монако', 'Монако', 'Манака', 'Monaco', 'Mónaco', 'Mónaco', 'Monaco', 'Monaco', 'Monaco', 'Monako', 'モナコ', 'Monakas', 'Monako', 'Monako'),
(130, 'Монголия', 'Монголiя', 'Манголія', 'Mongolia', 'Mongolia', 'Mongólia', 'Mongolei', 'Mongolie', 'Mongolia', 'Mongolia', 'モンゴル', 'Mongolija', 'Mongolija', 'Mongolsko'),
(131, 'Монтсеррат', 'Монтсеррат', 'Мантсэрат', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'Montserrat', 'モントセラト', 'Monseratas', 'Montserrata', 'Montserrat'),
(132, 'Мьянма', 'М\'янма', 'М\'янма', 'Myanmar', 'Birmania', 'Mianmar', 'Myanmar', 'Birmanie', 'Myanmar', 'Birma', 'ミャンマー', 'Birma', 'Mjanma', 'Myanmar'),
(133, 'Намибия', 'Намiбiя', 'Намібія', 'Namibia', 'Namibia', 'Namíbia', 'Namibia', 'Namibie', 'Namibia', 'Namibia', 'ナミビア', 'Namibija', 'Namībija', 'Namibie'),
(134, 'Науру', 'Науру', 'Навуру', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'Nauru', 'ナウル', 'Nauru', 'Nauru', 'Nauru'),
(135, 'Непал', 'Непал', 'Нэпал', 'Nepal', 'Nepal', 'Nepal', 'Nepal', 'Népal', 'Nepal', 'Nepal', 'ネパール', 'Nepalas', 'Nepāla', 'Nepál'),
(136, 'Нигер', 'Нiгер', 'Нігер', 'Niger', 'Níger', 'Níger', 'Niger', 'Niger', 'Niger', 'Niger', 'ニジェール', 'Nigeris', 'Nigera', 'Niger'),
(137, 'Нигерия', 'Нiгерiя', 'Нігерыя', 'Nigeria', 'Nigeria', 'Nigéria', 'Nigeria', 'Nigéria', 'Nigeria', 'Nigeria', 'ナイジェリア', 'Nigerija', 'Nigērija', 'Nigérie'),
(138, 'Нидерланды', 'Нiдерланди', 'Нідэрлянды', 'Netherlands', 'Holanda', 'Países Baixos', 'Niederlande', 'Pays-Bas', 'Olanda', 'Holandia', 'オランダ', 'Nyderlandai', 'Nīderlande', 'Nizozemsko'),
(139, 'Никарагуа', 'Нiкарагуа', 'Нікарагуа', 'Nicaragua', 'Nicaragua', 'Nicarágua', 'Nicaragua', 'Nicaragua', 'Nicaragua', 'Nikaragua', 'ニカラグア', 'Nikaragva', 'Nikaragva', 'Nikaragua'),
(140, 'Ниуэ', 'Нiуе', 'Нівуэ', 'Niue', 'Niue', 'Niue', 'Niue', 'Niue', 'Niue', 'Niue', 'ニウエ', 'Niue<br>', 'Niue', 'Niue'),
(141, 'Новая Зеландия', 'Нова Зеландiя', 'Новая Зэляндыя', 'New Zealand', 'Nueva Zelanda', 'Nova Zelândia', 'Neuseeland', 'Nouvelle Zélande', 'Nuova Zelanda', 'Nowa Zelandia', 'ニュージーランド', 'Naujoji Zelandija', 'Jaunzelande', 'Nový Zéland'),
(142, 'Новая Каледония', 'Нова Каледонiя', 'Новая Каледонія', 'New Caledonia', 'Nueva Caledonia', 'Nova Caledónia', 'Neukaledonien', 'Nouvelle Calédonie', 'Nuova Caledonia', 'Nowa Kaledonia', 'ニューカレドニア', 'Naujoji Kaledonija', 'Jaunkaledonija', 'Nová Kaledonie'),
(143, 'Норвегия', 'Норвегiя', 'Нарвэгія', 'Norway', 'Noruega', 'Noruega', 'Norwegen', 'Norvège', 'Norvegia', 'Norwegia', 'ノルウェー', 'Norvegija', 'Norvēģija', 'Norsko'),
(144, 'Объединенные Арабские Эмираты', 'Об\'єднанi Арабськi Емiрати', 'Аб\'яднаныя Арабскія Эміраты', 'United Arab Emirates', 'Emiratos Árabes Unidos', 'Emirados Árabes Unidos', 'Vereinigte Arabische Emirate', 'Emirats Arabes Unis', 'Emirati Arabi Uniti', 'Zjednoczone Emiraty Arabskie', 'アラブ首長国連邦', 'Jungtiniai Arabų Emyratai', 'Apvienotie Arābu Emirati', 'Spojené arabské emiráty'),
(145, 'Оман', 'Оман', 'Аман', 'Oman', 'Omán', 'Omã', 'Oman', 'Oman', 'Oman', 'Oman', 'オマーン', 'Omanas', 'Omāna', 'Omán'),
(146, 'Остров Мэн', 'Острiв Мен', 'Выспа Мэн', 'Isle of Man', 'Islas Man', 'Ilha de Man', 'Insel Man', 'Ile de Man', 'Isola di Man', 'Isle of Man', 'マン島', 'Meno sala', 'Mēna', 'Ostrov Man'),
(147, 'Остров Норфолк', 'Острiв Норфолк', 'Выспа Норфалк', 'Norfolk Island', 'Islas Norfolk', 'Ilha Norfolk', 'Norfolkinsel', 'Ile Norfolk', 'Isola di Norfolk', 'Wyspa Norfolk', 'ノーフォーク諸島', 'Norfolko sala', 'Norfolka', 'Ostrov Norfolk'),
(148, 'Острова Кайман', 'Острови Кайман', 'Выспы Кайман', 'Cayman Islands', 'Islas Caimán', 'Ilhas Caimão', 'Kaimaninseln', 'Iles Caïman', 'Isole Cayman', 'Kajmany', 'ケイマン諸島', 'Kaimanų salos', 'Kaimana salas', 'Kajmanské ostrovy'),
(149, 'Острова Кука', 'Острови Кука', 'Выспы Кука', 'Cook Islands', 'Islas Cook', 'Ilha Cook', 'Cook-Inseln', 'Iles Cook', 'Isole Cook', 'Wyspy Cooka', 'クック諸島', 'Kuko salos', 'Kūka salas', 'Cookovy ostrovy'),
(150, 'Острова Теркс и Кайкос', 'Острови Теркс i Кайкос', 'Выспы Тэркс і Кайкос', 'Turks and Caicos Islands', 'Islas Turcas y Caicos', 'Ilhas Turcas e Caicos', 'Turks- und Caicos Inseln', 'Iles Turques et Caïques', 'Isole Turks e Caicos', 'Turks i Caicos', 'タークス・カイコス諸島', 'Terkso ir Kaikoso salos', 'Tērksas un Kaikosas', 'Ostrovy Turks a Caicos'),
(151, 'Пакистан', 'Пакистан', 'Пакістан', 'Pakistan', 'Pakistán', 'Paquistão', 'Pakistan', 'Pakistan', 'Pakistan', 'Pakistan', 'パキスタン', 'Pakistanas', 'Pakistāna', 'Pákistán'),
(152, 'Палау', 'Палау', 'Палаў', 'Palau', 'Palaos', 'Palau', 'Palau', 'Palaos', 'Palau', 'Palau', 'パラウ', 'Palau', 'Palava', 'Palau'),
(153, 'Палестинская автономия', 'Палестинська автономiя', 'Палестынская аўтаномія', 'Palestine', 'Palestina', 'Autoridade Nacional Palestiniana', 'Palestina', 'Palestine', 'ANP', 'Palestyna', 'パレスティナ自治区', 'Palestinos teritorija', 'Palestīnas autonomija', 'Palestina'),
(154, 'Панама', 'Панама', 'Панама', 'Panama', 'Panamá', 'Panamá', 'Panama', 'Panama', 'Panama', 'Panama', 'パナマ', 'Panama', 'Panama', 'Panama'),
(155, 'Папуа - Новая Гвинея', 'Папуа - Нова Гвiнея', 'Папуа - Новая Ґвінэя', 'Papua New Guinea', 'Papúa Nueva Guinea', 'Papua-Nova Guiné', 'Papua-Neuguinea', 'Papouasie-Nouvelle Guinée', 'Papua Nuova Guinea', 'Papua Nowa Gwinea', 'パプア・ニューギニア', 'Papua - Naujoji Gvinėja', 'Papua Jaungvineja', 'Papua Nová Guinea'),
(156, 'Парагвай', 'Парагвай', 'Параґвай', 'Paraguay', 'Paraguay', 'Paraguai', 'Paraguay', 'Paraguay', 'Paraguay', 'Paragwaj', 'パラグアイ', 'Paragvajus', 'Paragvaja', 'Paraguay'),
(157, 'Перу', 'Перу', 'Пэру', 'Peru', 'Perú', 'Peru', 'Peru', 'Pérou', 'Peru', 'Peru', 'ペルー', 'Peru', 'Peru', 'Peru'),
(158, 'Питкерн', 'Пiткерн', 'Піткэрн', 'Pitcairn Islands', 'Islas Pitcairn', 'Ilhas Pitcairn', 'Pitcairn-Inseln', 'Iles Pitcairn', 'Isole Pitcairn', 'Wyspy Pitcairn', 'ピトケアン諸島', 'Pitkernas', 'Pitkerna', 'Pitcairnovy ostrovy'),
(159, 'Польша', 'Польща', 'Польшча', 'Poland', 'Polonia', 'Polónia', 'Polen', 'Pologne', 'Polonia', 'Polska', 'ポーランド', 'Lenkija', 'Polija', 'Polsko'),
(160, 'Португалия', 'Португалiя', 'Партугалія', 'Portugal', 'Portugal', 'Portugal', 'Portugal', 'Portugal', 'Portogallo', 'Portugalia', 'ポルトガル', 'Portugalija', 'Portugāle', 'Portugalsko'),
(161, 'Пуэрто-Рико', 'Пуерто-Рiко', 'Пуэрта-Рыка', 'Puerto Rico', 'Puerto Rico', 'Porto Rico', 'Puerto Rico', 'Porto Rico', 'Puerto Rico', 'Puerto Rico', 'プエルトリコ', 'Puerto Rikas', 'Puerto Riko', 'Portoriko'),
(162, 'Реюньон', 'Реюньон', 'Рэюньён', 'Réunion', 'Reunión', 'Réunion', 'Réunion', 'Réunion', 'Réunion', 'Réunion', 'レユニオン', 'Reunionas', 'Reinjona', 'Réunion'),
(163, 'Руанда', 'Руанда', 'Руанда', 'Rwanda', 'Ruanda', 'Ruanda', 'Ruanda', 'Rwanda', 'Ruanda', 'Rwanda', 'ルアンダ', 'Ruanda', 'Ruanda', 'Rwanda'),
(164, 'Румыния', 'Румунiя', 'Румынія', 'Romania', 'Rumanía', 'Roménia', 'Rumänien', 'Roumanie', 'Romania', 'Rumunia', 'ルーマニア', 'Rumunija', 'Rumānija', 'Rumunsko'),
(165, 'Сальвадор', 'Сальвадор', 'Сальвадор', 'El Salvador', 'El Salvador', 'Salvador', 'El Salvador', 'Salvador', 'El Salvador', 'Salwador', 'サルバドール', 'Salvadoras', 'Salvadora', 'Salvador'),
(166, 'Самоа', 'Самоа', 'Самоа', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'Samoa', 'サモア', 'Samoa', 'Samoa', 'Samoa'),
(167, 'Сан-Марино', 'Сан-Марiно', 'Сан-Марына', 'San Marino', 'San Marino', 'San Marino', 'San Marino', 'Saint-Marin', 'San Marino', 'San Marino', 'サンマリノ', 'San Marinas', 'Sanmarino', 'San Marino'),
(168, 'Сан-Томе и Принсипи', 'Сан-Томе i Прiнсiпi', 'Сан-Тамэ й Прынсыпі', 'São Tomé and Príncipe', 'Santo Tomé y Príncipe', 'São Tomé e Príncipe', 'São Tomé und Príncipe', 'Sao-Tomé et Principe', 'São Tomé e Príncipe', 'Wyspy São Tomé i Książęca', 'サントメ・プリンシペ', 'San Tomė ir Prinsipė', 'San Tome un Prinsipi', 'Svatý Tomáš a Princův ostrov'),
(169, 'Саудовская Аравия', 'Саудiвська Аравiя', 'Саудаўская Арабія', 'Saudi Arabia', 'Arabia Saudí', 'Arábia Saudita', 'Saudi Arabien', 'Arabie Saoudite', 'Arabia Saudita', 'Arabia Saudyjska', 'サウジアラビア', 'Saudo Arabija', 'Sauda Arābija', 'Saúdská Arábie'),
(170, 'Свазиленд', 'Свазiленд', 'Свазылэнд', 'Swaziland', 'Suazilandia', 'Suazilândia', 'Swasiland', 'Swaziland', 'Swaziland', 'Swaziland', 'スワジランド', 'Svazilendas', 'Svazilenda', 'Svazijsko'),
(171, 'Святая Елена', 'Святої Єлени', 'Сьвятая Алена', 'Saint Helena', 'Santa Helena', 'Santa Elena', 'St. Helena', 'Sainte Hélène', 'Sant\'Elena', 'Wyspa Św. Heleny', 'セントヘレナ', 'ŠV. Elenos sala', 'Svētās Helēnas Sala', 'Svatá Helena'),
(172, 'Северная Корея', 'Пiвнiчна Корея', 'Паўночная Карэя', 'North Korea', 'Corea del Norte', 'Coreia do Norte', 'Nordkorea', 'Corée du Nord', 'Corea del Nord', 'Korea Północna', '北朝鮮', 'Šiaurės Korėja', 'Ziemeļkoreja', 'Severní Korea'),
(173, 'Северные Марианские острова', 'Пiвнiчнi Марiанськi острови', 'Паўночныя Марыянскія выспы', 'Northern Mariana Islands', 'Islas Marianas del Norte', 'Ilhas Marianas', 'Nördliche Marianen', 'Iles Mariannes du Nord', 'Isole Northern Mariana', 'Wyspy Północnej Mariany', '北マリアナ諸島', 'Šiaurės Marianų salos', 'Ziemeļu Marianas Salas', 'Mariánské ostrovy'),
(174, 'Сейшелы', 'Сейшели', 'Сэйшэлы', 'Seychelles', 'Seychelles', 'Seicheles', 'Seychellen', 'Seychelles', 'Seychelles', 'Seszele', 'セイシェル', 'Seišeliai', 'Seišelu salas', 'Seychely'),
(175, 'Сенегал', 'Сенегал', 'Сэнэгал', 'Senegal', 'Senegal', 'Senegal', 'Senegal', 'Sénégal', 'Senegal', 'Senegal', 'セネガル', 'Senegalas<br>', 'Senegāla', 'Senegal'),
(176, 'Сент-Винсент', 'Сент-Вiнсент', 'Сэнт-Вінцэнт', 'Saint Vincent and the Grenadines', 'San Vicente', 'São Vicente', 'St. Vincent und die Grenadinen', 'Saint-Vincent', 'Saint Vincent e Grenadines', 'Saint Vincent i Grenadyny', 'セントビンセント', 'Sent Vincentas', 'Sentvinsenta', 'Svatý Vincent a Grenadiny'),
(177, 'Сент-Китс и Невис', 'Сент-Китс i Невiс', 'Сэнт-Кітз і Нэвіс', 'Saint Kitts and Nevis', 'San Cristóbal y Nieves', 'São Cristóvão e Nevis', 'St. Kitts und Nevis', 'Saint-Christophe et Niévès', 'Saint Kitts e Nevis', 'Saint Kitts i Nevis', 'クリストファー・ネイビス', 'Sent Kitsas ir Nevis', 'Sentkitsa un Nevisa', 'Svatý Kryštof a Nevis'),
(178, 'Сент-Люсия', 'Сент-Люсiя', 'Сэнт-Люсія', 'Saint Lucia', 'Santa Lucía', 'Santa Lúcia', 'St. Lucia', 'Sainte-Lucie', 'Saint Lucia', 'Santa Lucia', 'セントルシア', 'Sent Liucija', 'Sentlusija', 'Svatá Lucie'),
(179, 'Сент-Пьер и Микелон', 'Сент-Пьєр i Мiкелон', 'Сэн-П’ер і Мікелён', 'Saint Pierre and Miquelon', 'San Pedro y Miguelón', 'Saint-Pierre e Miquelon', 'Saint-Pierre und Miquelon', 'Saint-Pierre et Miquelon', 'Saint Pierre e Miquelon', 'Saint Pierre i Miquelon', 'サンピエール島・ミクロン島', 'Sen Pjeras ir Mikelonas', 'Senpjēra un Mikelona', 'Saint-Pierre a Miquelon'),
(180, 'Сербия', 'Сербiя', 'Сэрбія', 'Serbia', 'Serbia', 'Sérvia', 'Serbien', 'Serbie', 'Serbia', 'Serbia', 'セルビア', 'Serbija', 'Serbija', 'Srbsko'),
(181, 'Сингапур', 'Сiнгапур', 'Сынґапур', 'Singapore', 'Singapur', 'Singapura', 'Singapur', 'Singapour', 'Singapore', 'Singapur', 'シンガポール', 'Singapūras', 'Singapūra', 'Singapur'),
(182, 'Синт-Мартен', 'Сінт-Мартен', 'Сінт-Мартэн', 'Sint Maarten', 'Sint Maarten', 'São Martinho (Caraíbas)', 'Sint Maarten', 'Saint-Martin', 'Sint Maarten', 'Saint Martin', 'シント・マールテン', 'Sint Martenas ', 'Sint Maarten', 'Sint Maarten'),
(183, 'Сирийская Арабская Республика', 'Сiрiйська Арабська Республiка', 'Сырыйская Арабская Рэспубліка', 'Syria', 'Siria', 'República Árabe da Síria', 'Syrien', 'Syrie', 'Siria', 'Syria', 'シリア・アラブ共和国', 'Sirija', 'Sīrija', 'Sýrie'),
(184, 'Словакия', 'Словаччина', 'Славаччына', 'Slovakia', 'Eslovaquia', 'Eslováquia', 'Slowakei', 'Slovaquie', 'Slovacchia', 'Słowacja', 'スロヴァキア', 'Slovakija', 'Slovākija', 'Slovensko'),
(185, 'Словения', 'Словенiя', 'Славенія', 'Slovenia', 'Eslovenia', 'Eslovénia', 'Slowenien', 'Slovénie', 'Slovenia', 'Słowenia', 'スロベニア', 'Slovėnija', 'Slovēnija', 'Slovinsko'),
(186, 'Соломоновы Острова', 'Соломоновi Острови', 'Саламонавы выспы', 'Solomon Islands', 'Islas Salomón', 'Ilhas Salomão', 'Salomoninseln', 'Iles Salomon', 'Isole Solomon', 'Wyspy Solomona', 'ソロモン諸島', 'Saliamono salos', 'Zālamanu salas', 'Šalomounovy ostrovy'),
(187, 'Сомали', 'Сомалi', 'Самалі', 'Somalia', 'Somalia', 'Somália', 'Somalia', 'Somalie', 'Somalia', 'Somalia', 'ソマリア', 'Somalis', 'Somali', 'Somálsko'),
(188, 'Судан', 'Судан', 'Судан', 'Sudan', 'Sudán', 'Sudão', 'Sudan', 'Soudan', 'Sudan', 'Sudan', 'スーダン', 'Sudanas', 'Sudāna', 'Súdán'),
(189, 'Суринам', 'Сурiнам', 'Сурынам', 'Suriname', 'Surinam', 'Suriname', 'Suriname', 'Surinam', 'Suriname', 'Surinam', 'スリナム', 'Surinamas', 'Surinama', 'Surinam'),
(190, 'США', 'США', 'ЗША', 'USA', 'EE.UU.', 'EUA', 'USA', 'USA', 'Stati Uniti', 'USA', 'アメリカ合衆国', 'JAV', 'ASV', 'USA'),
(191, 'Сьерра-Леоне', 'Сьєрра-Леоне', 'Сьера-Леонэ', 'Sierra Leone', 'Sierra Leona', 'Serra Leoa', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 'シエラレオネ', 'Siera Leonė', 'Sjero-Leone', 'Sierra Leone'),
(192, 'Таиланд', 'Таїланд', 'Тайлянд', 'Thailand', 'Tailandia', 'Tailândia', 'Thailand', 'Thaïlande', 'Tailandia', 'Tajlandia', 'タイ', 'Tailandas', 'Tailanda', 'Thajsko'),
(193, 'Тайвань', 'Тайвань', 'Тайвань', 'Taiwan', 'Taiwan', 'Taiwan', 'Taiwan', 'Taïwan', 'Taiwan', 'Tajwan', '台湾', 'Taivanas', 'Taivāna', 'Tchaj-wan'),
(194, 'Танзания', 'Танзанiя', 'Танзанія', 'Tanzania', 'Tanzania', 'Tanzânia', 'Tansania', 'Tanzanie', 'Tanzania', 'Tanzania', 'タンザニア', 'Tanzanija', 'Tanzānija', 'Tanzanie'),
(195, 'Того', 'Того', 'Тога', 'Togo', 'Togo', 'Togo', 'Togo', 'Togo', 'Togo', 'Togo', 'トーゴ', 'Togas', 'Togo', 'Togo'),
(196, 'Токелау', 'Токелау', 'Такелаў', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'Tokelau', 'トケラウ', 'Tokelau', 'Tokelava', 'Tokelau'),
(197, 'Тонга', 'Тонга', 'Тонга', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'Tonga', 'トンガ', 'Tongas', 'Tonga', 'Tonga'),
(198, 'Тринидад и Тобаго', 'Тринiдад i Тобаго', 'Трынідад і Табага', 'Trinidad and Tobago', 'Trinidad y Tobago', 'Trinidad e Tobago', 'Trinidad und Tobago', 'Trinité et Tobago', 'Trinidad e Tobago', 'Trinidad and Tobago', 'トリニダード・トバゴ', 'Trinidadas ir Tobagas', 'Trindada un Tobago', 'Trinidad a Tobago'),
(199, 'Тувалу', 'Тувалу', 'Тувалу', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'Tuvalu', 'ツバル', 'Tuvalu', 'Tuvalu', 'Tuvalu'),
(200, 'Тунис', 'Тунiс', 'Туніс', 'Tunisia', 'Túnez', 'Tunísia', 'Tunesien', 'Tunisie', 'Tunisia', 'Tunezja', 'チュニス', 'Tunisas', 'Tunisija', 'Tunisko'),
(201, 'Туркменистан', 'Туркменістан', 'Туркмэністан', 'Turkmenistan', 'Turkmenistán', 'Turquemenistão', 'Turkmenistan', 'Turkménistan', 'Turkmenistan', 'Turkmenistan', 'トルクメニスタン', 'Turkmėnistanas', 'Turkmenistāna', 'Turkmenistán'),
(202, 'Турция', 'Туреччина', 'Турэччына', 'Turkey', 'Turquía', 'Turquia', 'Türkei', 'Turquie', 'Turchia', 'Turcja', 'トルコ', 'Turkija', 'Turcija', 'Turecko'),
(203, 'Уганда', 'Уганда', 'Уганда', 'Uganda', 'Uganda', 'Uganda', 'Uganda', 'Ouganda', 'Uganda', 'Uganda', 'ウガンダ', 'Uganda', 'Uganda', 'Uganda'),
(204, 'Украина', 'Україна', 'Украіна', 'Ukraine', 'Ucrania', 'Ucrânia', 'Ukraine', 'Ukraine', 'Ucraina', 'Ukraina', 'ウクライナ', 'Ukraina', 'Ukraina', 'Ukrajina'),
(205, 'Уоллис и Футуна', 'Уоллiс i Футуна', 'Ўоліс і Футуна', 'Wallis and Futuna', 'Wallis y Futuna', 'Wallis e Futuna', 'Wallis und Futuna', 'Wallis et Futuna', 'Wallis e Futuna', 'Wallis i Futuna', 'ウォリス・フツナ', 'Vallisas ir Futuna', 'Volisa un Futuna', 'Wallis a Futuna'),
(206, 'Уругвай', 'Уругвай', 'Уруґвай', 'Uruguay', 'Uruguay', 'Uruguai', 'Uruguay', 'Uruguay', 'Uruguay', 'Urugwaj', 'ウルグアイ', 'Urugvajus', 'Urugvaja', 'Uruguay'),
(207, 'Фарерские острова', 'Фарерськi острови', 'Фарэрскія выспы', 'Faroe Islands', 'Islas Feroe', 'Ilhas Feroe', 'Färöer', 'Iles Féroé', 'Isole Faroe', 'Wyspy Owcze', 'フェロー諸島', 'Farerų salos', 'Fāru salas', 'Faerské ostrovy'),
(208, 'Фиджи', 'Фiджi', 'Фіджы', 'Fiji', 'Fiyi', 'Fiji', 'Fidschi', 'Fidji', 'Fiji', 'Fidżi', 'フィジー', 'Fidžis', 'Fidži', 'Fidži'),
(209, 'Филиппины', 'Фiлiппiни', 'Філіпіны', 'Philippines', 'Filipinas', 'Filipinas', 'Philippinen', 'Philippines', 'Filippine', 'Filipiny', 'フィリピン', 'Filipinai', 'Filipīnas', 'Filipíny'),
(210, 'Финляндия', 'Фiнляндiя', 'Фінляндыя', 'Finland', 'Finlandia', 'Finlândia', 'Finnland', 'Finlande', 'Finlandia', 'Finlandia', 'フィンランド', 'Suomija', 'Somija', 'Finsko'),
(211, 'Фолклендские острова', 'Фолклендськi острови', 'Фальклэндзкія выспы', 'Falkland Islands', 'Islas Malvinas', 'Ilhas Malvinas', 'Falkland Inseln', 'Iles Malouines', 'Isole Falkland/Malvinas', 'Wyspy Falklandzkie', 'フォークランド諸島', 'Folklendų salos', 'Folklendas salas', 'Falklandské ostrovy'),
(212, 'Франция', 'Францiя', 'Францыя', 'France', 'Francia', 'França', 'Frankreich', 'France', 'Francia', 'Francja', 'フランス', 'Prancūzija', 'Francija', 'Francie'),
(213, 'Французская Гвиана', 'Французька Гвiана', 'Француская Гвіяна', 'French Guiana', 'Guayana Francesa', 'Guiana Francesa', 'Französisch-Guayana', 'Guyane française', 'Guiana Francese', 'Gujana Francuska', 'フランス領ガイアナ', 'Prancūzijos Gviana', 'Franču Gviāna', 'Francouzská Guyana'),
(214, 'Французская Полинезия', 'Французька Полiнезiя', 'Француская Палінэзія', 'French Polynesia', 'Polinesia Francesa', 'Polinésia Francesa', 'Französisch Polynesien', 'Polynésie française', 'Polinesia Francese', 'Polinezja Francuska', 'フランス領ポリネシア', 'Prancūzijos Polinezija', 'Fraņču Polinēzija', 'Francouzská Polynésie'),
(215, 'Хорватия', 'Хорватiя', 'Харватыя', 'Croatia', 'Croacia', 'Croácia', 'Kroatien', 'Croatie', 'Croazia', 'Chorwacja', 'クロアチア', 'Kroatija', 'Horvātija', 'Chorvatsko'),
(216, 'Центрально-Африканская Республика', 'Центральноафриканська Республiка', 'Цэнтральна-Афрыканская Рэспубліка', 'Central African Republic', 'República Centroafricana', 'República Centro-Africana', 'Zentralafrikanische Republik', 'République centrafricaine', 'Repubblica Centro Africana', 'Republika Środkowo-Afrykańska', '中央アフリカ共和国', 'Centrinės Afrikos Respublika', 'Centrālāfrikas Republika', 'Středoafrická republika'),
(217, 'Чад', 'Чад', 'Чад', 'Chad', 'Chad', 'Chade', 'Tschad', 'Tchad', 'Chad', 'Czad', 'チャド', 'Čadas', 'Čada', 'Čad'),
(218, 'Черногория', 'Чорногорiя', 'Чарнагорыя', 'Montenegro', 'Montenegro', 'Montenegro', 'Montenegro', 'Monténégro', 'Montenegro', 'Czarnogóra', 'モンテネグロ', 'Juodkalnija', 'Melnkalne', 'Černá Hora'),
(219, 'Чехия', 'Чехiя', 'Чэхія', 'Czech Republic', 'Chequia', 'República Checa', 'Tschechische Republik', 'République tchèque', 'Repubblica Ceca', 'Czechy', 'チェコ', 'Čekija', 'Čehija', 'Česká republika'),
(220, 'Чили', 'Чилi', 'Чылі', 'Chile', 'Chile', 'Chile', 'Chile', 'Chili', 'Cile', 'Chile', 'チリ', 'Čilė', 'Čīle', 'Chile'),
(221, 'Швейцария', 'Швейцарiя', 'Швайцарыя', 'Switzerland', 'Suiza', 'Suíça', 'Schweiz', 'Suisse', 'Svizzera', 'Szwajcaria', 'スイス', 'Šveicarija', 'Šveice', 'Švýcarsko'),
(222, 'Швеция', 'Швецiя', 'Швэцыя', 'Sweden', 'Suecia', 'Suécia', 'Schweden', 'Suède', 'Svezia', 'Szwecja', 'スウェーデン', 'Švedija', 'Zviedrija', 'Švédsko'),
(223, 'Шпицберген и Ян Майен', 'Шпiцберген i Ян Майен', 'Шпіцбэрґен і Ян Маен', 'Svalbard and Jan Mayen', 'Spitsbergen y Jan Mayen', 'Spitsbergen  e Jan Mayen', 'Svalbard und Jan Mayen', 'Spitzberg et Jan Mayen', 'Svalbard e Jan Mayen', 'Svalbard i Jan Mayen', 'スピッツベルゲン島・ヤンマイエン島', 'Svalbardo ir Jan Majen salos', 'Špicbergena', 'Špicberky a Jan Mayen'),
(224, 'Шри-Ланка', 'Шрi-Ланка', 'Шры-Лянка', 'Sri Lanka', 'Sri-Lanka', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 'スリランカ', 'Šri Lanka', 'Šrilanka', 'Srí Lanka'),
(225, 'Эквадор', 'Еквадор', 'Эквадор', 'Ecuador', 'Ecuador', 'Equador', 'Ecuador', 'Equateur', 'Ecuador', 'Ekwador', 'エクアドル', 'Ekvadoras', 'Ekvadora', 'Ekvádor'),
(226, 'Экваториальная Гвинея', 'Екваторiальна Гвiнея', 'Экватарыяльная Гвінэя', 'Equatorial Guinea', 'Guinea Ecuatorial', 'Guiné Equatorial', 'Äquatorialguinea', 'Guinée équatoriale', 'Guinea Equatoriale', 'Gwinea Równikowa', '赤道ギニア', 'Pusiaujo Gvinėja', 'Ekvotoriāla Gvineja', 'Rovníková Guinea'),
(227, 'Эритрея', 'Ерiтрея', 'Эрытрэя', 'Eritrea', 'Eritrea', 'Eritreia', 'Eritrea', 'Erythrée', 'Eritrea', 'Erytrea', 'エリトリア', 'Eritrėja', 'Eritreja', 'Eritrea'),
(228, 'Эстония', 'Естонiя', 'Эстонія', 'Estonia', 'Estonia', 'Estónia', 'Estland', 'Estonie', 'Estonia', 'Estonia', 'エストニア', 'Estija', 'Igaunija', 'Estonsko'),
(229, 'Эфиопия', 'Ефiопiя', 'Этыёпія', 'Ethiopia', 'Etiopía', 'Etiópia', 'Äthiopien', 'Ethiopie', 'Etiopia', 'Etiopia', 'エチオピア', 'Etiopija', 'Etiopija', 'Etiopie'),
(230, 'Южная Корея', 'Пiвденна Корея', 'Паўднёвая Карэя', 'South Korea', 'Corea del Sur', 'Coreia do Sul', 'Südkorea', 'Corée du Sud', 'Corea del Sud', 'Korea Południowa', '大韓民国', 'Pietų Korėja', 'Dienvidkoreja', 'Jižní Korea'),
(231, 'Южно-Африканская Республика', 'Пiвденно-Африканська Республiка', 'Паўднёва-Афрыканская Рэспубліка', 'South Africa', 'República de Sudáfrica', 'República da África do Sul', 'Südafrika', 'Afrique du Sud', 'Sud Africa', 'RPA', '南アフリカ共和国', 'Pietų Afrikos Respublika', 'Dienvidāfrikas Republika', 'Jihoafrická republika'),
(232, 'Южный Судан', 'Південний Судан', 'Паўднёвы Судан', 'South Sudan', 'Sudán del Sur', 'Sudão do Sul', 'Republik Südsudan', 'République du Soudan du Sud', 'Repubblica del Sudan del Sud', 'Sudan Południowy', '南スーダン', 'Pietų Sudanas ', 'South Sudan', 'Jižní Súdán'),
(233, 'Ямайка', 'Ямайка', 'Ямайка', 'Jamaica', 'Jamaica', 'Jamaica', 'Jamaika', 'Jamaïque', 'Giamaica', 'Jamajka', 'ジャマイカ', 'Jamaika', 'Jamaika', 'Jamajka'),
(234, 'Япония', 'Японiя', 'Японія', 'Japan', 'Japón', 'Japão', 'Japan', 'Japon', 'Giappone', 'Japonia', '日本', 'Japonija', 'Japāna', 'Japonsko');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
