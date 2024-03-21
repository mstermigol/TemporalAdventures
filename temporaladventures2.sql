-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2024 a las 12:41:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `temporaladventures2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `community_posts`
--

CREATE TABLE `community_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_of_event` date NOT NULL,
  `place_of_event` varchar(255) NOT NULL,
  `category` enum('Art and culture','War and Conflict','Music and Entertainment','Inventions and Discoveries','Daily Life and Customs','Exploration and Adventure') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `community_posts`
--

INSERT INTO `community_posts` (`id`, `title`, `description`, `image`, `date_of_event`, `place_of_event`, `category`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'World War III', 'At the threshold of the millennium, the world was ensnared in a tense web of alliances, rivalries, and arms races. Superpowers, seeking to extend their geopolitical influence, wove complex relationships with smaller nations, while separatist groups and terrorist organizations exacerbated regional conflicts. In this charged atmosphere, a relatively minor incident became the spark that ignited the fuse of the Third World War. <br> In June of the year 2000, an unidentified submarine sank an aircraft carrier during a naval exercise in the South China Sea. Despite the lack of conclusive evidence, tensions among the region\'s nations escalated rapidly, and the incident quickly made international headlines as an act of aggression. Global markets plummeted as investors feared the worst.<br>Over the following weeks, coordinated hacks dismantled the information networks of several superpowers, further increasing distrust and fear. Baseless accusations and conspiracy theories flooded the media, fueling public hysteria.<br> In August, a devastating terrorist attack at a peace summit in Vienna claimed the lives of several world leaders. Chaos ensued, with multiple nations declaring martial law. Though the perpetrators remained unidentified, countries rushed to point fingers, and defensive pacts were activated in a series of chain reactions.<br> On September 3rd, a coalition of European nations, led by survivors of the Vienna summit and motivated by desperation, launched a preemptive strike against military installations in North Africa, where they believed a rival superpower was planning a continental coup. The operation proved to be a tragic mistake; intelligence was faulty, and the affected nations, innocent of the accusations, clamored for revenge.<br>\nRussia and China, drawn into the conflict by their own interests and alliances, mobilized their forces. The United States, still grappling with the aftermath of the terrorist attack, entered the war after a direct assault on its forces abroad.<br>\nThe war was brutal and swift, with advances in cyber technology and drones altering the nature of combat. The skies were filled with unmanned aerial vehicles, and battlefields were disrupted by cyber warfare, with hackers playing key roles. Cities became battlegrounds, with street fights causing massive civilian casualties.<br>\nCombat halted as abruptly as it had begun, with a series of tactical nuclear strikes leaving entire regions uninhabitable. Mutual assured destruction had been narrowly avoided, but at a horrendous cost. The signing of a ceasefire in 2005, mediated by the rebuilt UN, brought an end to active hostilities, but the Third World War continues in the minds and spirits of those who survived its horrors.<br>\nThe aftermath of the war was profound. Political borders were redrawn, entire economies needed rebuilding, and distrust among and within nations deepened. A global peace movement gained traction, with citizens of the world demanding disarmament and a new form of global governance to prevent such a catastrophe from occurring again. The Third World War, though hypothetical, serves as a grim reminder of the fragilities of peace and the importance of dialogue and mutual understanding.<br>', '/images/community/ejemplo1.webp', '2000-04-27', 'World', 'War and Conflict', 1, '2024-03-21 15:56:49', '2024-03-21 15:56:49'),
(2, 'North korean President Donald Trump', 'It was a sweltering summer day in Pyongyang when the unthinkable happened - Donald Trump, the former President of the United States, was announced as the new Supreme Leader of North Korea.<br>\nHow this came to pass was a mystery to most, but rumors swirled of backroom deals and a hostile corporate takeover of the hermit kingdom.<br>\nTrump wasted no time in putting his personal stamp on the regime. The first order of business was rebranding - North Korea was re-christened the \"Democratic People\'s Republic of Trumpistan.\" The nation\'s flag was redesigned to be a gaudy portrait of Trump giving a thumbs up, with golden tassels bordering the image.<br>\nThe nuclear program, which had been a top priority under previous leaders, was put on the backburner in favor of more important projects driven by Trump\'s insatiable ego. Construction began immediately on a series of massive statues, huge beachfront resorts, and the tallest building in the world - all bearing Trump\'s name in neon lights.<br>\nIn an unexpected move, Trump announced that all citizens would be required to start calling him \"The Donald\" as a sign of respect. Those who refused would be sent for re-education at labor camps that Trump rebranded as \"Tremendous Work Resorts.\"<br>\nTrade negotiations with other nations went poorly, as Trump demanded ludicrously one-sided deals and hurled petty insults at world leaders who disagreed with his terms. Before long, Trumpistan was hit with crippling sanctions and cut off from global markets.<br>\nOn the home front, quality of life plummeted as resources were redirected from basic services towards ever more elaborate pyramids to Trump\'s glory. Widespread famine broke out, which Trump dismissed as \"no biggie, people just need to eat a little less to look slimmer like me.\"<br>\nIn a last-ditch effort to turn things around, Trump announced the world\'s first eleventeenth month would be added to the calendar and named \"Trumptember\" after himself. He declared this was a strategic move to maximize the nation\'s economic output with bonus time.<br>\nUnfortunately for the once reclusive nation, Trump\'s relentless self-promotion and social media antics ensured that the world saw every embarrassing misstep of his disastrous reign play out in real-time. The Trump regime became a punchline across the globe, finally ending in a wild coup attempt that saw Trump desperately asking \"Where are my nukes??\" before being dragged out by his iconic hair.<br>\nIn the end, the chapter of the so-called \"Democratic People\'s Republic of Trumpistan\" went down as one of the most bizarre, incompetent, and fleeting reigns in the history of nations. But for that all too brief period, the world got a terrifying glimpse of what might have been if Donald Trump had ever managed to completely consolidate power.<br>', '/images/community/ejemplo2.webp', '2016-04-27', 'North Korea', 'Music and Entertainment', 4, '2024-03-21 15:56:49', '2024-03-21 15:56:49'),
(3, 'The Flying Car Revolution', 'It was the year 1990 and the world was about to change forever. A small team of engineers and developers in California had been working tirelessly on a top-secret project - the world\'s first viable flying car. After years of failed prototypes and setbacks, they had finally cracked the code. The Skyline 2000 was sleek, aerodynamic, and most importantly, it could take to the skies with the greatest of ease. <br>\nWhen the Skyline 2000 was unveiled to the world, it caused an absolute frenzy. The ability to fly directly to your destination without dealing with traffic or roads was the stuff of science fiction. Overnight, the flying car became the must-have product for the wealthy and the ambitious. The first few years saw only limited production as the technology was new and extremely expensive. But it didn\'t take long before other manufacturers began to take notice and jump into the flying car game.<br>\nBy the late 1990s, flying cars had hit the mainstream in a big way. Suddenly, the skies were filled with personal aircraft zipping through the air. What had once been a novelty was rapidly becoming a transformative way of life. The implications were immense - cities had to construct vertiplans and air docking facilities, a whole new domain of air traffic control had to be established, and the aviation industry underwent a massive expansion and restructuring.<br>\nThe early 2000s could be considered the golden age of the flying car. Racing between skyscrapers and bypassing ground traffic became the norm for urban commuters and traveling businesspeople. Air taxis and ridesharing flight apps made it cheaper than ever for the middle class to take to the skies. Suburbs sprawled even further as morning and evening air commutes extended the feasible distance for city workers. The open road became a relic as families opted for the open skies on their annual vacations.<br>\nHowever, as flying cars grew more ubiquitous, a parallel set of challenges emerged. Noise pollution became a major issue, with the constant drone of aerial vehicles driving some city residents to distraction. Airports and flight corridors grew increasingly crowded and dangerous, leading to many tragic accidents. Criminal airspace violations cropped up as flying cars proved useful for getaways and illegal transport. Environmental concerns also started growing about the proliferation of airborne traffic and emissions.<br>\nBy the 2020s, governments around the world were being forced to grapple with the unforeseen consequences of mass aerial transit. Strict laws, no-fly zones, mandatory flight corridors, and emissions caps were implemented in cities. Black box recorders and air traffic control became mandatory for all flying cars. Pilot licensing requirements were tightened severely after a series of high-profile collisions and near-misses. The genie was out of the bottle, and officials were playing a perpetual game of catch-up.<br>\nToday, in the year 2040, flying cars are an accepted but highly regulated part of the global transit infrastructure. Roads are still in use, but purely optional - the city skylines are perpetually filled with personal and industrial air vehicles. The original climate concerns gave way to new sustainability models and electric air vehicles. Flying cars are no longer the wild frontier they were in the 90s - but they\'ve unquestionably reshaped the modern world in permanent ways. What began as a sci-fi dream turned into a transformative reality that took decades to fully navigate and adapt to. The flying car went from fantasy to unremarkable fact of life in the span of just 50 years.<br>', NULL, '1990-03-03', 'World', 'Inventions and Discoveries', 6, '2024-03-21 15:56:49', '2024-03-21 15:56:49'),
(4, 'The Nazi Nuclear Program and the German Atomic Bomb', 'By mid-1944, the situation in World War II had become desperate for Nazi Germany. The Allied forces were relentlessly advancing from the west, while the Soviet Red Army pushed towards Berlin from the east. Despite fierce German resistance, the numerical superiority and firepower of the Allies made the defeat of the Third Reich only a matter of time.<br>\nHowever, the Nazi scientists and leaders had an ace up their sleeve: the ambitious and ultra-secret German Nuclear Program, known as the Uranverein. Since the early 1930s, renowned physicists such as Werner Heisenberg had been working on developing nuclear fission and the possibilities of creating an atomic weapon. Although initial progress was slow, efforts intensified dramatically after the invasion of the Soviet Union in 1941.<br>\nUnder maximum security, nuclear research facilities were built in remote locations such as the underground Untereissbach plant in the Austrian Alps. Thousands of scientists, engineers, and workers were recruited, with almost unlimited resources coming from the Nazi regime. The existence of the Uranverein was hidden even from many high-ranking military officials, in an effort to keep it out of the reach of Allied air strikes.<br>\nBy late 1944, the work began to bear fruit. At a facility on the remote Baltic Sea island of Rügen, German researchers achieved the first controlled nuclear chain reaction outside of the United States. Weeks later, in an isolated valley in the Bavarian Alps, the first underground tests of a crude but operational nuclear device took place.<br>\nThe Nazi leaders were elated when informed of the scientific team\'s success. They immediately ordered the mass production of atomic bombs and their swift deployment against the Allied forces. Despite reservations from some scientists about the moral implications, the voice of dissuasion was quickly silenced by threats from the ruthless regime.<br>\nOn April 20, 1945, on a day that went down in history as Black Friday, several rudimentary German atomic bombs were detonated over vast concentrations of British, American, and Soviet troops on multiple fronts. The nuclear explosions were preceded by the dropping of warning bombs that gave only minutes to evacuate. The Allied fronts were paralyzed by shock and horror.<br>\nThe British cities of Dower and Norwich, as well as the French cities of Rennes and Verdun, were also targets of the devastating nuclear strikes. The destruction was indescribable, with hundreds of thousands of instant deaths. Beyond the physical destruction, Allied morale was shattered by the introduction of nuclear weapons.<br>\nDespite international calls for a ceasefire, Hitler and the Nazi leaders, emboldened by this scientific and military achievement, intensified their nuclear campaign. Increasingly powerful fission bombs struck Allied targets in Germany, Italy, France, Belgium, and the Netherlands throughout May and June of 1945.<br>\nThe Allies, desperately trying to develop their own nuclear weapons, were forced to almost completely withdraw from the European continent. The advancing Soviet forces closing in on Berlin were also targeted with atomic bombings, leaving the Red Army paralyzed and suffering massive casualties.<br>\nTo prevent even greater loss of life, the Western Allies were forced to accept a temporary ceasefire in late June. In a series of emergency meetings, the fateful decision was made to cede large swaths of Western Europe to German control, in exchange for Hitler halting the nuclear bombings.<br>\nThis fragile ceasefire established a lasting partition of Europe, with a Nazi-controlled Germany dominating from Spain to the Netherlands and western Poland. Despite Soviet efforts to continue the war, German nuclear supremacy proved to be insurmountable.<br>\nBy 1946, the world had become divided into three hostile spheres of influence: the Western Allies, Nazi Germany, and the communist Soviet Union. Each of these blocs feverishly competed to develop their own nuclear arsenal, ushering in a new and terrifying Atomic Arms Race.<br>\nThe Atomic Age had begun in the most abrupt and violent way possible, marking the start of nearly half a century of precarious peace and delirious nuclear brinksmanship known as the Atomic Cold War. The balance of nuclear power may have prevented another major open conflict, but under the constant threat of a nuclear holocaust that could wipe out human civilization at any moment.<br>\nIt was a grim and menacing world, born from scientific achievement and the unholy resolve to use nuclear weapons before one\'s enemies. The German atomic bomb not only turned the tides of World War II but shook the foundations of the world order for decades to come.<br>', '/images/community/ejemplo4.webp', '1945-02-02', 'Germany', 'War and Conflict', 2, '2024-03-21 15:56:49', '2024-03-21 15:56:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `travel_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2024_03_05_010603_create_communityposts_table', 1),
(17, '2024_03_05_010647_create_travels_table', 1),
(18, '2024_03_05_010755_create_reviews_table', 1),
(19, '2024_03_05_011101_create_orders_table', 1),
(20, '2024_03_05_011110_create_items_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `travel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `community_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `description`, `rating`, `user_id`, `travel_id`, `community_post_id`, `created_at`, `updated_at`) VALUES
(1, 'Chilling Account of World War III', 'A harrowing and chilling narration of how a series of misunderstandings and hasty actions triggered a devastating global war. A powerful warning about the consequences of distrust and fear.', 5, 3, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(2, 'The Reign of Incompetence: Trump as North Korean Leader', 'A hilariously terrifying satire of an alternate world where Trump ruled North Korea with his boundless ego. A raw look into the chaos and ruin that could have occurred had Trump held absolute power.', 4, 5, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(3, 'Nuclear Madness of World War III', 'A spine-chilling tale of a global war sparked by a misunderstanding, leading to tactical nuclear strikes and rendering entire regions uninhabitable. A grim look at the darkest consequences of armed conflict.', 4, 2, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(4, 'Trump\'s Disaster in North Korea', 'A hilariously chilling chronicle of the chaos that reigned when Trump took over North Korea, renaming it and driving the country into economic ruin with his boundless ego.', 3, 4, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(5, 'The Ignition of World War III', 'An unsettling account of how a series of seemingly minor events triggered a spiral of distrust and military actions leading the world to the brink of nuclear destruction.', 5, 1, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(6, 'The Madness of \"Trumptember\" in North Korea', 'A biting satire on Trump\'s desperate attempts to boost the North Korean economy by adding a month to the calendar and naming it in his honor, with disastrous results.', 4, 6, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(7, 'The Grim Legacy of World War III', 'An in-depth examination of the lasting consequences of the global war, with redesigned borders, devastated economies, and widespread distrust among nations.', 5, 2, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(8, 'The Ego Show: Trump as Supreme Leader', 'A scathing narrative of how Trump\'s boundless ego led him to rename North Korea, build extravagant monuments in his honor, and neglect the basic needs of his people.', 3, 3, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(9, 'The Horrors of World War III', 'A harrowing account of the terrible human costs of the war, with urban combat causing countless civilian casualties and the use of tactical nuclear weapons.', 4, 5, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(10, 'Trump\'s Brief and Chaotic Reign in North Korea', 'A biting chronicle of Trump\'s short but disastrous reign as Supreme Leader of North Korea, which led the country into economic ruin and international isolation.', 4, 1, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(11, 'The Role of Cyberwarfare in World War III', 'A fascinating analysis of how advances in cyber technology changed the nature of combat during the war, with hackers playing a key role on the battlefields.', 5, 4, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(12, 'The Nightmare of \"Tremendous Work Resorts\" by Trump', 'A satirical and terrifying look at the forced labor camps rebranded as \"Tremendous Work Resorts\" by Trump, where dissenters were sent to \"re-educate\".', 3, 6, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(13, 'The Peace Movement After World War III', 'An examination of how the horrors of war fueled a powerful global peace movement that demanded disarmament and a new form of international governance to prevent future conflicts.', 4, 2, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(14, 'The Economic Disaster of the Trump Era in North Korea', 'A biting analysis of how Trump\'s erratic and selfish economic policies, combined with international sanctions, led North Korea into a massive famine crisis.', 3, 3, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(15, 'The Enduring Scars of World War III', 'A poignant exploration of the lasting impact of the war on the minds and spirits of survivors, and how the psychological aftermath lingers long after hostilities have ceased.', 5, 5, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(16, 'The Joke That Went Too Far: Trump in North Korea', 'A scathing satire on how Trump\'s appointment as Supreme Leader of North Korea, initially thought to be a joke, quickly turned into a disaster of epic proportions.', 4, 1, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(17, 'Chronicle of the Spiral into World War III', 'A terrifying recount of how a series of misunderstandings, unfounded accusations, and chain reactions brought the world to the brink of total nuclear war.', 5, 4, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(18, 'The PR Disaster of the Trump Era in North Korea', 'A satirical look at how constant self-promotion and social media gaffes turned Trump\'s reign in North Korea into an international laughingstock.', 4, 6, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(19, 'The Lessons of World War III', 'An insightful analysis of the lessons that can be learned from the horrors of war, highlighting the importance of dialogue, mutual understanding, and diplomacy in preventing future conflicts.', 5, 2, NULL, 1, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(20, 'Trump\'s Coup Attempt in North Korea', 'A hilarious and terrifying account of Trump\'s desperate attempt to cling to power in North Korea, demanding access to nuclear weapons before being dragged out by his iconic hair.', 4, 3, NULL, 2, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(21, 'A Monumental Journey to the Past', 'Breathtaking experience witnessing the construction of the pyramids. A journey through time!', 5, 1, 1, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(22, 'Witnessing History: The Pyramids of Giza', 'Fascinating to see these colossal structures rise. An unforgettable journey.', 4, 2, 1, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(23, 'Hard Work for an Eternal Legacy', 'Impressive engineering and human effort behind the pyramids. A journey that makes you reflect.', 5, 3, 1, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(24, 'An Epic Journey: Following in Columbus\'s Footsteps', 'Exciting experience sailing across the Atlantic and reaching the Americas. A journey that changed the world!', 5, 4, 2, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(25, 'An Encounter of Cultures: The Clash of Two Worlds', 'Fascinating to see how two vastly different cultures met. A journey that broadens your mind.', 4, 5, 2, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50'),
(26, 'A Journey of Hope: Towards a New World', 'Exciting journey filled with hope and dreams. A journey that inspires you.', 5, 6, 2, NULL, '2024-03-21 15:56:50', '2024-03-21 15:56:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `travels`
--

CREATE TABLE `travels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date_of_destination` date NOT NULL,
  `price` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` enum('Art and culture','War and Conflict','Music and Entertainment','Inventions and Discoveries','Daily Life and Customs','Exploration and Adventure') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `travels`
--

INSERT INTO `travels` (`id`, `title`, `description`, `place`, `date_of_destination`, `price`, `start_date`, `end_date`, `image`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Construction of the Pyramids of Giza', 'Do you want to travel to the time of the construction of the pyramids of Giza? This is your chance!', 'Meseta de Giza', '2000-01-01', 5000, '2024-12-01', '2024-12-04', '/images/travels/pyramids-of-giza.webp', 'Inventions and Discoveries', '2024-03-21 15:56:47', '2024-03-21 15:56:47'),
(2, 'Discovery of America', 'Travel to the moment when Cristobal Colon arrived in America aboard his great and huge ships', 'Guanahaní', '1492-10-12', 2500, '2024-12-05', '2024-12-07', '/images/travels/cristobal-colon.webp', 'Inventions and Discoveries', '2024-03-21 15:56:47', '2024-03-21 15:56:47'),
(3, 'World War I', 'Travel to one of the largest battles of the First World War, fought between the British and French forces against the German Empire', 'Somme River, France', '1916-10-18', 15000, '2024-12-06', '2024-12-12', '/images/travels/world-war-i.webp', 'War and Conflict', '2024-03-21 15:56:47', '2024-03-21 15:56:47'),
(4, 'World War II', 'Travel to one of the largest and bloodiest battles in history, fought between Nazi Germany and the Soviet Union', 'Stalingrado, Soviet Union', '1942-01-10', 15000, '2024-12-13', '2024-12-18', '/images/travels/world-war-ii.webp', 'War and Conflict', '2024-03-21 15:56:47', '2024-03-21 15:56:47'),
(5, 'Nagasaki Atomic Bomb', 'Travel to the exact moment in which the first atomic bomb in history was dropped on the city of Nagazaki. BOOM!', 'Nagasaki, Japon', '1945-08-06', 120000, '2024-12-19', '2024-12-19', '/images/travels/nagasaki.webp', 'War and Conflict', '2024-03-21 15:56:47', '2024-03-21 15:56:47'),
(6, 'Hiroshima Atomic Bomb', 'Travel to the exact moment in which the second atomic bomb in history was dropped on the city of Hiroshima. BOOM!', 'Hiroshima, Japon', '1945-08-09', 110000, '2024-12-20', '2024-12-20', '/images/travels/hiroshima.webp', 'War and Conflict', '2024-03-21 15:56:47', '2024-03-21 15:56:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balance` bigint(20) UNSIGNED NOT NULL DEFAULT 9999999,
  `is_staff` tinyint(1) NOT NULL DEFAULT 0,
  `phone_number` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `balance`, `is_staff`, `phone_number`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fonsek', 'dfonsecalara27@gmail.com', NULL, '$2y$12$CB0ahJochmWM2CwejSxjae6XERBnb8sq3qjwq/.7HE.JU6lrQ9zfW', 9999999, 1, '3182498681', NULL, '2024-03-21 15:56:48', '2024-03-21 15:56:48'),
(2, 'Miguel', 'migue@gmail.com', NULL, '$2y$12$GDrySMKsYPBDZDVZ2DJmuu3n.1C0Mkf3jmPGMKZGXHFKtXW1sZf9G', 9999999, 1, '3104387682', NULL, '2024-03-21 15:56:48', '2024-03-21 15:56:48'),
(3, 'Sergio', 'sergio@gmail.com', NULL, '$2y$12$e2Qm1zoeE1DvroqzyUK4au0tgVIw29.5vvy.EpM3CKLzpXKwfIO5C', 9999999, 1, '3194809538', NULL, '2024-03-21 15:56:48', '2024-03-21 15:56:48'),
(4, 'Kristen', 'kristen@yahoo.com', NULL, '$2y$12$Fk9FBGCF19NBgUMRwsE9Ku/B8tNYzcJKoURy2HueIDNIyDT2LorRu', 9999999, 0, '2370776578', NULL, '2024-03-21 15:56:48', '2024-03-21 15:56:48'),
(5, 'Rachel', 'rachel@yahoo.com', NULL, '$2y$12$TIV5Rwntt3/cYv/TN.apfeeEx80jG8U1iS9ml88fMXCZZFzxFMzqS', 9999999, 0, '6580145228', NULL, '2024-03-21 15:56:49', '2024-03-21 15:56:49'),
(6, 'Richard', 'richard@yahoo.com', NULL, '$2y$12$Ztdo3Hx4G/vYGLbwimQquOVaDCvfa1MvFMhqPEuxkO6LJTblHINeW', 9999999, 0, '782668-3228', NULL, '2024-03-21 15:56:49', '2024-03-21 15:56:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `community_posts_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_travel_id_foreign` (`travel_id`),
  ADD KEY `items_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_travel_id_foreign` (`travel_id`),
  ADD KEY `reviews_community_post_id_foreign` (`community_post_id`);

--
-- Indices de la tabla `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `travels`
--
ALTER TABLE `travels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `community_posts`
--
ALTER TABLE `community_posts`
  ADD CONSTRAINT `community_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travels` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_community_post_id_foreign` FOREIGN KEY (`community_post_id`) REFERENCES `community_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_travel_id_foreign` FOREIGN KEY (`travel_id`) REFERENCES `travels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
