<?php

/*
    Author: David Fonseca
*/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityPostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('community_posts')->insert([
            [
                'id' => 1,
                'title' => 'World War III',
                'description' => <<<'EOF'
At the threshold of the millennium, the world was ensnared in a tense web of alliances, rivalries, and arms races. Superpowers, seeking to extend their geopolitical influence, wove complex relationships with smaller nations, while separatist groups and terrorist organizations exacerbated regional conflicts. In this charged atmosphere, a relatively minor incident became the spark that ignited the fuse of the Third World War. <br> In June of the year 2000, an unidentified submarine sank an aircraft carrier during a naval exercise in the South China Sea. Despite the lack of conclusive evidence, tensions among the region's nations escalated rapidly, and the incident quickly made international headlines as an act of aggression. Global markets plummeted as investors feared the worst.<br>Over the following weeks, coordinated hacks dismantled the information networks of several superpowers, further increasing distrust and fear. Baseless accusations and conspiracy theories flooded the media, fueling public hysteria.<br> In August, a devastating terrorist attack at a peace summit in Vienna claimed the lives of several world leaders. Chaos ensued, with multiple nations declaring martial law. Though the perpetrators remained unidentified, countries rushed to point fingers, and defensive pacts were activated in a series of chain reactions.<br> On September 3rd, a coalition of European nations, led by survivors of the Vienna summit and motivated by desperation, launched a preemptive strike against military installations in North Africa, where they believed a rival superpower was planning a continental coup. The operation proved to be a tragic mistake; intelligence was faulty, and the affected nations, innocent of the accusations, clamored for revenge.<br>
Russia and China, drawn into the conflict by their own interests and alliances, mobilized their forces. The United States, still grappling with the aftermath of the terrorist attack, entered the war after a direct assault on its forces abroad.<br>
The war was brutal and swift, with advances in cyber technology and drones altering the nature of combat. The skies were filled with unmanned aerial vehicles, and battlefields were disrupted by cyber warfare, with hackers playing key roles. Cities became battlegrounds, with street fights causing massive civilian casualties.<br>
Combat halted as abruptly as it had begun, with a series of tactical nuclear strikes leaving entire regions uninhabitable. Mutual assured destruction had been narrowly avoided, but at a horrendous cost. The signing of a ceasefire in 2005, mediated by the rebuilt UN, brought an end to active hostilities, but the Third World War continues in the minds and spirits of those who survived its horrors.<br>
The aftermath of the war was profound. Political borders were redrawn, entire economies needed rebuilding, and distrust among and within nations deepened. A global peace movement gained traction, with citizens of the world demanding disarmament and a new form of global governance to prevent such a catastrophe from occurring again. The Third World War, though hypothetical, serves as a grim reminder of the fragilities of peace and the importance of dialogue and mutual understanding.<br>
EOF,
                'image' => '/images/community/ejemplo1.webp',
                'date_of_event' => '2000-04-27',
                'place_of_event' => 'World',
                'category' => 'War and Conflict',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'North korean President Donald Trump',
                'description' => <<<'EOF'
It was a sweltering summer day in Pyongyang when the unthinkable happened - Donald Trump, the former President of the United States, was announced as the new Supreme Leader of North Korea.<br>
How this came to pass was a mystery to most, but rumors swirled of backroom deals and a hostile corporate takeover of the hermit kingdom.<br>
Trump wasted no time in putting his personal stamp on the regime. The first order of business was rebranding - North Korea was re-christened the "Democratic People's Republic of Trumpistan." The nation's flag was redesigned to be a gaudy portrait of Trump giving a thumbs up, with golden tassels bordering the image.<br>
The nuclear program, which had been a top priority under previous leaders, was put on the backburner in favor of more important projects driven by Trump's insatiable ego. Construction began immediately on a series of massive statues, huge beachfront resorts, and the tallest building in the world - all bearing Trump's name in neon lights.<br>
In an unexpected move, Trump announced that all citizens would be required to start calling him "The Donald" as a sign of respect. Those who refused would be sent for re-education at labor camps that Trump rebranded as "Tremendous Work Resorts."<br>
Trade negotiations with other nations went poorly, as Trump demanded ludicrously one-sided deals and hurled petty insults at world leaders who disagreed with his terms. Before long, Trumpistan was hit with crippling sanctions and cut off from global markets.<br>
On the home front, quality of life plummeted as resources were redirected from basic services towards ever more elaborate pyramids to Trump's glory. Widespread famine broke out, which Trump dismissed as "no biggie, people just need to eat a little less to look slimmer like me."<br>
In a last-ditch effort to turn things around, Trump announced the world's first eleventeenth month would be added to the calendar and named "Trumptember" after himself. He declared this was a strategic move to maximize the nation's economic output with bonus time.<br>
Unfortunately for the once reclusive nation, Trump's relentless self-promotion and social media antics ensured that the world saw every embarrassing misstep of his disastrous reign play out in real-time. The Trump regime became a punchline across the globe, finally ending in a wild coup attempt that saw Trump desperately asking "Where are my nukes??" before being dragged out by his iconic hair.<br>
In the end, the chapter of the so-called "Democratic People's Republic of Trumpistan" went down as one of the most bizarre, incompetent, and fleeting reigns in the history of nations. But for that all too brief period, the world got a terrifying glimpse of what might have been if Donald Trump had ever managed to completely consolidate power.<br>
EOF,
                'image' => '/images/community/ejemplo2.webp',
                'date_of_event' => '2016-04-27',
                'place_of_event' => 'North Korea',
                'category' => 'Music and Entertainment',
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'The Flying Car Revolution',
                'description' => <<<'EOF'
It was the year 1990 and the world was about to change forever. A small team of engineers and developers in California had been working tirelessly on a top-secret project - the world's first viable flying car. After years of failed prototypes and setbacks, they had finally cracked the code. The Skyline 2000 was sleek, aerodynamic, and most importantly, it could take to the skies with the greatest of ease. <br>
When the Skyline 2000 was unveiled to the world, it caused an absolute frenzy. The ability to fly directly to your destination without dealing with traffic or roads was the stuff of science fiction. Overnight, the flying car became the must-have product for the wealthy and the ambitious. The first few years saw only limited production as the technology was new and extremely expensive. But it didn't take long before other manufacturers began to take notice and jump into the flying car game.<br>
By the late 1990s, flying cars had hit the mainstream in a big way. Suddenly, the skies were filled with personal aircraft zipping through the air. What had once been a novelty was rapidly becoming a transformative way of life. The implications were immense - cities had to construct vertiplans and air docking facilities, a whole new domain of air traffic control had to be established, and the aviation industry underwent a massive expansion and restructuring.<br>
The early 2000s could be considered the golden age of the flying car. Racing between skyscrapers and bypassing ground traffic became the norm for urban commuters and traveling businesspeople. Air taxis and ridesharing flight apps made it cheaper than ever for the middle class to take to the skies. Suburbs sprawled even further as morning and evening air commutes extended the feasible distance for city workers. The open road became a relic as families opted for the open skies on their annual vacations.<br>
However, as flying cars grew more ubiquitous, a parallel set of challenges emerged. Noise pollution became a major issue, with the constant drone of aerial vehicles driving some city residents to distraction. Airports and flight corridors grew increasingly crowded and dangerous, leading to many tragic accidents. Criminal airspace violations cropped up as flying cars proved useful for getaways and illegal transport. Environmental concerns also started growing about the proliferation of airborne traffic and emissions.<br>
By the 2020s, governments around the world were being forced to grapple with the unforeseen consequences of mass aerial transit. Strict laws, no-fly zones, mandatory flight corridors, and emissions caps were implemented in cities. Black box recorders and air traffic control became mandatory for all flying cars. Pilot licensing requirements were tightened severely after a series of high-profile collisions and near-misses. The genie was out of the bottle, and officials were playing a perpetual game of catch-up.<br>
Today, in the year 2040, flying cars are an accepted but highly regulated part of the global transit infrastructure. Roads are still in use, but purely optional - the city skylines are perpetually filled with personal and industrial air vehicles. The original climate concerns gave way to new sustainability models and electric air vehicles. Flying cars are no longer the wild frontier they were in the 90s - but they've unquestionably reshaped the modern world in permanent ways. What began as a sci-fi dream turned into a transformative reality that took decades to fully navigate and adapt to. The flying car went from fantasy to unremarkable fact of life in the span of just 50 years.<br>
EOF,
                'image' => null,
                'date_of_event' => '1990-03-03',
                'place_of_event' => 'World',
                'category' => 'Inventions and Discoveries',
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'The Nazi Nuclear Program and the German Atomic Bomb',
                'description' => <<<'EOF'
By mid-1944, the situation in World War II had become desperate for Nazi Germany. The Allied forces were relentlessly advancing from the west, while the Soviet Red Army pushed towards Berlin from the east. Despite fierce German resistance, the numerical superiority and firepower of the Allies made the defeat of the Third Reich only a matter of time.<br>
However, the Nazi scientists and leaders had an ace up their sleeve: the ambitious and ultra-secret German Nuclear Program, known as the Uranverein. Since the early 1930s, renowned physicists such as Werner Heisenberg had been working on developing nuclear fission and the possibilities of creating an atomic weapon. Although initial progress was slow, efforts intensified dramatically after the invasion of the Soviet Union in 1941.<br>
Under maximum security, nuclear research facilities were built in remote locations such as the underground Untereissbach plant in the Austrian Alps. Thousands of scientists, engineers, and workers were recruited, with almost unlimited resources coming from the Nazi regime. The existence of the Uranverein was hidden even from many high-ranking military officials, in an effort to keep it out of the reach of Allied air strikes.<br>
By late 1944, the work began to bear fruit. At a facility on the remote Baltic Sea island of Rügen, German researchers achieved the first controlled nuclear chain reaction outside of the United States. Weeks later, in an isolated valley in the Bavarian Alps, the first underground tests of a crude but operational nuclear device took place.<br>
The Nazi leaders were elated when informed of the scientific team's success. They immediately ordered the mass production of atomic bombs and their swift deployment against the Allied forces. Despite reservations from some scientists about the moral implications, the voice of dissuasion was quickly silenced by threats from the ruthless regime.<br>
On April 20, 1945, on a day that went down in history as Black Friday, several rudimentary German atomic bombs were detonated over vast concentrations of British, American, and Soviet troops on multiple fronts. The nuclear explosions were preceded by the dropping of warning bombs that gave only minutes to evacuate. The Allied fronts were paralyzed by shock and horror.<br>
The British cities of Dower and Norwich, as well as the French cities of Rennes and Verdun, were also targets of the devastating nuclear strikes. The destruction was indescribable, with hundreds of thousands of instant deaths. Beyond the physical destruction, Allied morale was shattered by the introduction of nuclear weapons.<br>
Despite international calls for a ceasefire, Hitler and the Nazi leaders, emboldened by this scientific and military achievement, intensified their nuclear campaign. Increasingly powerful fission bombs struck Allied targets in Germany, Italy, France, Belgium, and the Netherlands throughout May and June of 1945.<br>
The Allies, desperately trying to develop their own nuclear weapons, were forced to almost completely withdraw from the European continent. The advancing Soviet forces closing in on Berlin were also targeted with atomic bombings, leaving the Red Army paralyzed and suffering massive casualties.<br>
To prevent even greater loss of life, the Western Allies were forced to accept a temporary ceasefire in late June. In a series of emergency meetings, the fateful decision was made to cede large swaths of Western Europe to German control, in exchange for Hitler halting the nuclear bombings.<br>
This fragile ceasefire established a lasting partition of Europe, with a Nazi-controlled Germany dominating from Spain to the Netherlands and western Poland. Despite Soviet efforts to continue the war, German nuclear supremacy proved to be insurmountable.<br>
By 1946, the world had become divided into three hostile spheres of influence: the Western Allies, Nazi Germany, and the communist Soviet Union. Each of these blocs feverishly competed to develop their own nuclear arsenal, ushering in a new and terrifying Atomic Arms Race.<br>
The Atomic Age had begun in the most abrupt and violent way possible, marking the start of nearly half a century of precarious peace and delirious nuclear brinksmanship known as the Atomic Cold War. The balance of nuclear power may have prevented another major open conflict, but under the constant threat of a nuclear holocaust that could wipe out human civilization at any moment.<br>
It was a grim and menacing world, born from scientific achievement and the unholy resolve to use nuclear weapons before one's enemies. The German atomic bomb not only turned the tides of World War II but shook the foundations of the world order for decades to come.<br>
EOF,
                'image' => '/images/community/ejemplo4.webp',
                'date_of_event' => '1945-02-02',
                'place_of_event' => 'Germany',
                'category' => 'War and Conflict',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
