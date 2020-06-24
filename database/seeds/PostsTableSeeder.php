<?php

use App\Category;
use App\Photo;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create([
            "name"=>"administrator"
        ]);
        $role2 = Role::create([
            "name"=>"subscriber"
        ]); 
        $role3 = Role::create([
            "name"=>"author"
        ]);
        $role4 = Role::create([
            "name"=>"guest"
        ]);

        $photo1 = Photo::create(["file"=>"5.jpg"]);
        $photo2 = Photo::create(["file"=>"6.jpg"]);
        $photo3 = Photo::create(["file"=>"7.jpg"]);
        $photo4 = Photo::create(["file"=>"8.jpg"]);
        $photo5 = Photo::create(["file"=>"9.jpg"]);
        $photo6 = Photo::create(["file"=>"10.jpg"]);
        $photo7 = Photo::create(["file"=>"11.jpg"]);
        $photo8 = Photo::create(["file"=>"12.jpg"]);
        $photo9 = Photo::create(["file"=>"13.jpg"]);
        $photo10 = Photo::create(["file"=>"14.jpg"]);
        $photo11 = Photo::create(["file"=>"15.jpg"]);
        $photo12 = Photo::create(["file"=>"16.jpg"]);
        $photo13 = Photo::create(["file"=>"17.jpg"]);
        $photo14 = Photo::create(["file"=>"18.jpg"]);
        $photo15 = Photo::create(["file"=>"1.jpg"]);
        $photo16 = Photo::create(["file"=>"2.jpg"]);

        $author1 = User::create([
            "name"=>"Mark x",
            "email"=>"markx@gmail.com",
            "password"=>Hash::make('password'),
            "role_id"=>$role2->id,
            "photo_id"=>$photo5->id,
        ]);

        $author2 = User::create([
            "name"=>"Lisaer Miss",
            "email"=>"lisaermiss@gmail.com",
            "password"=>Hash::make('password'),
            "role_id"=>$role3->id,
            "photo_id"=>$photo6->id,
        ]);


        $author3 = User::create([
            "name"=>"Wilson Kinyua Muthoni",
            "email"=>"kinyuamuthoni@gmail.com",
            "password"=>Hash::make('password'),
             "role_id"=>$role4->id,
             "photo_id"=>$photo7->id,
        ]);

        $author4 = User::create([
            "name"=>"Kinyua Muthoni",
            "email"=>"muthonikinyua@gmail.com",
            "password"=>Hash::make('password'),
             "role_id"=>$role4->id,
             "photo_id"=>$photo8->id,
        ]);


        $category1 = Category::create([
            "name"=>"News",
            "user_id"=>$author1->id
        ]);
        $category2 = Category::create([
            "name"=>"Updates",
            "user_id"=>$author2->id
        ]); 
        $category3 = Category::create([
            "name"=>"Design",
            "user_id"=>$author1->id
        ]);
        $category4 = Category::create([
            "name"=>"Marketing",
            "user_id"=>$author3->id
        ]);
        $category5 = Category::create([
            "name"=>"Partnership",
            "user_id"=>$author1->id
        ]);  
        $category6 = Category::create([
            "name"=>"Product",
            "user_id"=>$author2->id
        ]);
        $category7 = Category::create([
            "name"=>"Hiring",
            "user_id"=>$author1->id
        ]);
        $category8 = Category::create([
            "name"=>"Offers",
            "user_id"=>$author4->id
        ]);
        $category8 = Category::create([
            "name"=>"Education",
            "user_id"=>$author1->id
        ]);


        $tag1 = Tag::create([
            "name"=>"Progress",
            "user_id"=>$author1->id
        ]);
        $tag2 = Tag::create([
            "name"=>"Record",
            "user_id"=>$author3->id
        ]);
        $tag3 = Tag::create([
            "name"=>"Custormers",
            "user_id"=>$author2->id
        ]);
        $tag4 = Tag::create([
            "name"=>"Freebie",
            "user_id"=>$author4->id
        ]);
        $tag5 = Tag::create([
            "name"=>"Offer",
            "user_id"=>$author1->id
        ]);
        $tag6 = Tag::create([
            "name"=>"Screenshot",
            "user_id"=>$author2->id
        ]);
        $tag7 = Tag::create([
            "name"=>"Milestone",
            "user_id"=>$author3->id
        ]);
        $tag8 = Tag::create([
            "name"=>"Version",
            "user_id"=>$author4->id
        ]);
        $tag9 = Tag::create([
            "name"=>"Design",
            "user_id"=>$author1->id
        ]);
        $tag10 = Tag::create([
            "name"=>"Customers",
            "user_id"=>$author2->id
        ]);
        $tag11 = Tag::create([
            "name"=>"Job",
            "user_id"=>$author3->id
        ]);
        $tag12 = Tag::create([
            "name"=>"Gender",
            "user_id"=>$author4->id
        ]);
        $tag12 = Tag::create([
            "name"=>"Education",
            "user_id"=>$author1->id
        ]);
        $post1 = $author1->posts()->create([
            "title"=>"How Whiteness Killed the Body Positive Movement",
            "short_description"=>"was March 2017, and I was sitting on stage at SXSW, arguing with a men’s rights activist. I’d been invited to host a panel called “My Body Is NSFW,” about the issue of censorship and erasure of fat bodies in media. I’d pitched the panel based on an article I’d written for my column, The Anti-Diet Project. Beside me sat Nicolette Mason and Gabi Gregg — both iconic media figures and personal heroines of mine — whom I’d invited to join as my panelists. As a fangirl, it was the thrill of a lifetime. Furthermore, they’d been speaking out about body positivity long before it was a buzzword (and doing so as a queer and Black woman, respectively). The event had gone beautifully thus far: a passionate discussion about unconscious bias, intersectionality, the progress made by those of us in the body positive movement, and the urgent work still yet to be done to dismantle systemic anti-fat stigma.",
            "content"=>"Then we opened the floor for questions. The MRA stood up, pointed his smartphone at us, and in a quiet, almost docile voice, accused us of discriminating against him and all men, who were biologically programmed to prefer thin, attractive women. Body positivity was a hate movement against men, was it not? (I’m paraphrasing, simply because his “question” was so long, convoluted, and overstuffed with logical fallacies it would make your brain bleed.) He was obviously trying to incite our fat feminist rage — thus we responded with calm voices and reason. Of course body positivity wasn’t a hate movement. Beauty standards were socialized, not biological, and so on. The MRA wasn’t satisfied, and refused to stop talking. The back-and-forth continued for five excruciating minutes, with Nicolette and Gabi doing most of the talking. They whipped out statistics and evidence-based arguments, their voices growing firm and righteous while I struggled to keep mine from shaking.
            While I often liked to point out that body positivity was for everyone, I became ever more aware that it was mostly women like me who benefited from it.
            The event was falling apart. I looked around, wondering if someone from the festival staff would intervene and end this. But it was Gabi who finally did: “This question is really offensive.” She turned to address the rest of the audience. “He came in here with the intention of trolling us. If anyone is wondering what we’ve been talking about here,” she gestured to the troll. “Here you go.” The audience broke into applause, and the MRA walked out in a huff. Gabi turned to a woman in the back. “Yes, next question.”
            I’ve thought about that moment a lot over the last three years. At the time I was merely embarrassed for not doing a better job as a moderator. Nicolette and Gabi were there to speak, and it was my job to facilitate that. Furthermore, I’d let a Black woman do the heavy lifting for me: a white, straight, cisgender, able-bodied woman, and the one holding the microphone. Gabi had called out a hate-monger to his face, while I’d sat there, looking around for the manager, wondering how I could kick him out politely. Jesus Christ. Hello, my name is Kelsey Miller, but feel free to call me Karen.
            started The Anti-Diet Project in 2013, as a staffer at the popular millennial lifestyle website Refinery29. It began as simply a chronicle of my own reckoning with diet culture and my journey to unlearn all the toxic messages it had beat into my brain. But as soon as my first post went live, the column took off, taking me along with it. Within weeks I got my first national television appearance, and then an agent, and then a book deal. It wasn’t that I and my body image issues were so unique (hardly). I’d just happened to say the right words at the right time. Something was brewing in the zeitgeist, and seemingly overnight, the whole world woke up and suddenly realized that they shouldn’t make fat jokes, and demanded that magazines stop using skinny models and that diet companies were fucked up. That it wasn’t enough to just not be mean to fat people, but that they should be “body positive.” People were ready for something different, and suddenly it had a name: “body positivity.”
            Of course, body positivity was not new — not by a long shot — it just had a new face. And I hadn’t simply tripped and fallen into success. I was white and young and employed by a popular outlet during a time when body positivity was trendy. While I personally was (and remain) sincerely committed to this cause, and worked hard for it, fat Black women had been working just as hard or harder for decades. And there’s no doubt that fat Black people had suffered far worse consequences of anti-fat bias for centuries.
            Fat activism began in earnest in the 1960s, growing in tandem with the movements for women’s liberation and Black Civil Rights. It wasn’t a coincidence: fatphobia is the very child of misogyny and racism. It was a concept conceived by colonists and codified by Enlightenment-era race scientists, who did not discover but create the idea that Africans (African women, specifically) were gluttonous, lazy, ignorant, and unable to control their “animal appetites.” It was one of these race scientists who also invented the BMI — another bigoted, pseudoscientific invention. But fatphobia goes back further than that.
            That’s why the mainstream body positive movement did not actually move as much as it damn well should have. It didn’t end fatphobia because it did not center the racism at its core.
            Fatphobia’s hideous origin story is perhaps best laid out in the groundbreaking 2019 book Fearing the Black Body, by sociologist Sabrina Strings, PhD. In it, Strings points out that while most people assume our cultural disdain for fatness is a product of health concerns, “[fatphobia] precedes the medical establishment’s concerns about excess weight by nearly 100 years…it’s actually rooted in the trans-Atlantic slave trade and Protestantism.” The slave trade spread the false notion of Black voraciousness, while Protestantism railed against gluttony, preaching purity through restriction and temperance, Strings argues. Thus thinness came to symbolize the highest ideals of white western Europe, while fatness became a mark of both racial and moral impurity. And, like slavery and Protestantism, this concept was laid into the foundation of white America.
            Fatphobia has been leveled as a weapon against virtually every marginalized American population since colonization. Strings states that generations of interracial sex in American colonies meant that by the 19th century, skin color was “a poor sorting mechanism” for determining race. But fatness, on the other hand, was so fundamentally linked with Blackness in cultural consciousness, that simply being fat — or just not thin — became an indicator of racial inferiority. This, she says, is how many immigrant populations from the Irish to Russian Jews came to be treated as “part-Black” and therefore denigrated by white American society.
            But no one in this country has suffered so long and so brutally the monstrous effects of fatphobia more than fat Black Americans. Centuries later, it remains an insidious form of white oppression: Black people are redlined and ghettoized into neighborhoods with more pollution and less accessible health care and fewer food options, then have their health problems dismissed by the medical system as simply their own fat faults. The Black death rate from Covid-19 is approximately 3.6 times higher than that of white Americans — a statistic often cited as a direct result of obesity, though there is no data at this point to back up such a claim.
            And indeed, fatness has even been used to defend police officers charged (or not) with the killing of Black men. In 2019, NYPD Officer Daniel Pantaleo sat through disciplinary hearings five years after putting Eric Garner in a fatal chokehold, for which he was never charged or fired. In his defense, Pantaleo’s lawyer said, “[Garner] was a ticking time bomb that resisted arrest. If he was put in a bear hug, it [death] would have been the same outcome.” This he said in direct contradiction of the medical examiner’s report.
            “The realities of fatphobia extend far beyond what most body positivity rhetoric typically addresses,” wrote Sherronda J. Brown, the managing editor of Wear Your Voice, in a searing response piece to Pantaleo’s defense. Mainstream body positive advocates denounced fatphobia as an issue of racist and stigmatizing beauty standards, she continued: “While this is indeed one part of how fatphobia manifests in our lives, it is not its main function… The true function of fatphobia is to dehumanize and debase.” And though it is weaponized as such against fat people of all races, it is inherently anti-Black and innately racist, having been invented and disseminated by white people as a means of denigrating Black people. Our contemporary bias against fat people is the direct descendent of our overt dehumanization of Black people. To hate fat bodies is to hate bodies that seem “Black.” But crucially, when a white person — especially a white, able-bodied, upper-middle-class, straight, cisgender person with a job at a fancy website — is marginalized by fatphobia, they are also protected from the worst of it by a thick cushion of privilege.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo1->id
        ]);
        $post2 = $author3->posts()->create([
            "title"=>"Coronavirus May Be a Blood Vessel Disease, Which Explains Everything",
            "short_description"=>"April, blood clots emerged as one of the many mysterious symptoms attributed to Covid-19, a disease that had initially been thought to largely affect the lungs in the form of pneumonia. Quickly after came reports of young people dying due to coronavirus-related strokes. Next it was Covid toes — painful red or purple digits.
            What do all of these symptoms have in common? An impairment in blood circulation. Add in the fact that 40% of deaths from Covid-19 are related to cardiovascular complications, and the disease starts to look like a vascular infection instead of a purely respiratory one.
            Months into the pandemic, there is now a growing body of evidence to support the theory that the novel coronavirus can infect blood vessels, which could explain not only the high prevalence of blood clots, strokes, and heart attacks, but also provide an answer for the diverse set of head-to-toe symptoms that have emerged.",
            "content"=>"“All these Covid-associated complications were a mystery. We see blood clotting, we see kidney damage, we see inflammation of the heart, we see stroke, we see encephalitis [swelling of the brain],” says William Li, MD, president of the Angiogenesis Foundation. “A whole myriad of seemingly unconnected phenomena that you do not normally see with SARS or H1N1 or, frankly, most infectious diseases.”
            “If you start to put all of the data together that’s emerging, it turns out that this virus is probably a vasculotropic virus, meaning that it affects the [blood vessels],” says Mandeep Mehra, MD, medical director of the Brigham and Women’s Hospital Heart and Vascular Center.
            In a paper published in April in the scientific journal The Lancet, Mehra and a team of scientists discovered that the SARS-CoV-2 virus can infect the endothelial cells that line the inside of blood vessels. Endothelial cells protect the cardiovascular system, and they release proteins that influence everything from blood clotting to the immune response. In the paper, the scientists showed damage to endothelial cells in the lungs, heart, kidneys, liver, and intestines in people with Covid-19.
            “The concept that’s emerging is that this is not a respiratory illness alone, this is a respiratory illness to start with, but it is actually a vascular illness that kills people through its involvement of the vasculature,” says Mehra.
            A respiratory virus infecting blood cells and circulating through the body is virtually unheard of.
            A one-of-a-kind respiratory virus
            SARS-CoV-2 is thought to enter the body through ACE2 receptors present on the surface of cells that line the respiratory tract in the nose and throat. Once in the lungs, the virus appears to move from the alveoli, the air sacs in the lung, into the blood vessels, which are also rich in ACE2 receptors.
            “[The virus] enters the lung, it destroys the lung tissue, and people start coughing. The destruction of the lung tissue breaks open some blood vessels,” Mehra explains. “Then it starts to infect endothelial cell after endothelial cell, creates a local immune response, and inflames the endothelium.”
            A respiratory virus infecting blood cells and circulating through the body is virtually unheard of. Influenza viruses like H1N1 are not known to do this, and the original SARS virus, a sister coronavirus to the current infection, did not spread past the lung. Other types of viruses, such as Ebola or Dengue, can damage endothelial cells, but they are very different from viruses that typically infect the lungs.",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo2->id
        ]);
        $post3 = $author2->posts()->create([
            "title"=>"Endothelial damage could explain the virus’ weird symptoms",
            "short_description"=>"An infection of the blood vessels would explain many of the weird tendencies of the novel coronavirus, like the high rates of blood clots. Endothelial cells help regulate clot formation by sending out proteins that turn the coagulation system on or off. The cells also help ensure that blood flows smoothly and doesn’t get caught on any rough edges on the blood vessel walls.
            “The endothelial cell layer is in part responsible for [clot] regulation, it inhibits clot formation through a variety of ways,” says Sanjum Sethi, MD, MPH, an interventional cardiologist at Columbia University Irving Medical Center. “If that’s disrupted, you could see why that may potentially promote clot formation.”",
            "content"=>"Endothelial damage might account for the high rates of cardiovascular damage and seemingly spontaneous heart attacks in people with Covid-19, too. Damage to endothelial cells causes inflammation in the blood vessels, and that can cause any plaque that’s accumulated to rupture, causing a heart attack. This means anyone who has plaque in their blood vessels that might normally have remained stable or been controlled with medication is suddenly at a much higher risk for a heart attack.
            “Inflammation and endothelial dysfunction promote plaque rupture,” Sethi says. “Endothelial dysfunction is linked towards worse heart outcomes, in particular myocardial infarction or heart attack.”
            Blood vessel damage could also explain why people with pre-existing conditions like high blood pressure, high cholesterol, diabetes, and heart disease are at a higher risk for severe complications from a virus that’s supposed to just infect the lungs. All of those diseases cause endothelial cell dysfunction, and the additional damage and inflammation in the blood vessels caused by the infection could push them over the edge and cause serious problems.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo3->id
        ]);
        $post4 = $author1->posts()->create([
            "title"=>"Congratulate and thank to Maryam for joining our team",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo4->id
        ]);

        $post5 = $author1->posts()->create([
            "title"=>"If Covid-19 is a vascular disease, the best antiviral therapy might not be antiviral therapy",
            "short_description"=>"An alternative theory is that the blood clotting and symptoms in other organs are caused by inflammation in the body due to an over-reactive immune response — the so-called cytokine storm. This inflammatory reaction can occur in other respiratory illnesses and severe cases of pneumonia, which is why the initial reports of blood clots, heart complications, and neurological symptoms didn’t sound the alarm bells. However, the magnitude of the problems seen with Covid-19 appear to go beyond the inflammation experienced in other respiratory infections.
            “There is some increased propensity, we think, of clotting happening with these [other] viruses. I think inflammation in general promotes that,” Sethi says. “Is this over and above or unique for SARS-CoV-2, or is that just because [the infection] is just that much more severe? I think those are all really good questions that unfortunately we don’t have the answer to yet.”",
            "content"=>"Anecdotally, Sethi says the number of requests he received as the director of the pulmonary embolism response team, which deals with blood clots in the lungs, in April 2020 was two to three times the number in April 2019. The question he’s now trying to answer is whether that’s because there were simply more patients at the hospital during that month, the peak of the pandemic, or if Covid-19 patients really do have a higher risk for blood clots.
            “I suspect from what we see and what our preliminary data show is that this virus has an additional risk factor for blood clots, but I can’t prove that yet,” Sethi says.
            The good news is that if Covid-19 is a vascular disease, there are existing drugs that can help protect against endothelial cell damage. In another New England Journal of Medicine paper that looked at nearly 9,000 people with Covid-19, Mehra showed that the use of statins and ACE inhibitors were linked to higher rates of survival. Statins reduce the risk of heart attacks not only by lowering cholesterol or preventing plaque, they also stabilize existing plaque, meaning they’re less likely to rupture if someone is on the drugs.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo5->id
        ]);
        $post6 = $author3->posts()->create([
            "title"=>"Confessions of a Former Bastard Cop",
            "short_description"=>"I was a police officer for nearly ten years and I was a bastard. We all were.
            This essay has been kicking around in my head for years now and I’ve never felt confident enough to write it. It’s a time in my life I’m ashamed of. It’s a time that I hurt people and, through inaction, allowed others to be hurt. It’s a time that I acted as a violent agent of capitalism and white supremacy. Under the guise of public safety, I personally ruined people’s lives but in so doing, made the public no safer… so did the family members and close friends of mine who also bore the badge alongside me.
            But enough is enough.",
            "content"=>"The reforms aren’t working. Incrementalism isn’t happening. Unarmed Black, indigenous, and people of color are being killed by cops in the streets and the police are savagely attacking the people protesting these murders.
            American policing is a thick blue tumor strangling the life from our communities and if you don’t believe it when the poor and the marginalized say it, if you don’t believe it when you see cops across the country shooting journalists with less-lethal bullets and caustic chemicals, maybe you’ll believe it when you hear it straight from the pig’s mouth.
            WHY AM I WRITING THIS
            As someone who went through the training, hiring, and socialization of a career in law enforcement, I wanted to give a first-hand account of why I believe police officers are the way they are. Not to excuse their behavior, but to explain it and to indict the structures that perpetuate it.
            I believe that if everyone understood how we’re trained and brought up in the profession, it would inform the demands our communities should be making of a new way of community safety. If I tell you how we were made, I hope it will empower you to unmake us.
            One of the other reasons I’ve struggled to write this essay is that I don’t want to center the conversation on myself and my big salty boo-hoo feelings about my bad choices. It’s a toxic white impulse to see atrocities and think “How can I make this about me?” So, I hope you’ll take me at my word that this account isn’t meant to highlight me, but rather the hundred thousand of me in every city in the country. It’s about the structure that made me (that I chose to pollute myself with) and it’s my meager contribution to the cause of radical justice.",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo6->id
        ]);
        $post7 = $author2->posts()->create([
            "title"=>"YES, ALL COPS ARE BASTARDS",
            "short_description"=>"I was a police officer in a major metropolitan area in California with a predominantly poor, non-white population (with a large proportion of first-generation immigrants). One night during briefing, our watch commander told us that the city council had requested a new zero tolerance policy. Against murderers, drug dealers, or child predators?
            No, against homeless people collecting cans from recycling bins.
            See, the city had some kickback deal with the waste management company where waste management got paid by the government for our expected tonnage of recycling. When homeless people “stole” that recycling from the waste management company, they were putting that cheaper contract in peril. So, we were to arrest as many recyclers as we could find.",
            "content"=>"Even for me, this was a stupid policy and I promptly blew Sarge off. But a few hours later, Sarge called me over to assist him. He was detaining a 70 year old immigrant who spoke no English, who he’d seen picking a coke can out of a trash bin. He ordered me to arrest her for stealing trash. I said, “Sarge, c’mon, she’s an old lady.” He said, “I don’t give a shit. Hook her up, that’s an order.” And… I did. She cried the entire way to the station and all through the booking process. I couldn’t even comfort her because I didn’t speak Spanish. I felt disgusting but I was ordered to make this arrest and I wasn’t willing to lose my job for her.
            If you’re tempted to feel sympathy for me, don’t. I used to happily hassle the homeless under other circumstances. I researched obscure penal codes so I could arrest people in homeless encampments for lesser known crimes like “remaining too close to railroad property” (369i of the California Penal Code). I used to call it “planting warrant seeds” since I knew they wouldn’t make their court dates and we could arrest them again and again for warrant violations.
            We used to have informal contests for who could cite or arrest someone for the weirdest law. DUI on a bicycle, non-regulation number of brooms on your tow truck (27700(a)(1) of the California Vehicle Code)… shit like that. For me, police work was a logic puzzle for arresting people, regardless of their actual threat to the community. As ashamed as I am to admit it, it needs to be said: stripping people of their freedom felt like a game to me for many years.
            I know what you’re going to ask: did I ever plant drugs? Did I ever plant a gun on someone? Did I ever make a false arrest or file a false report? Believe it or not, the answer is no. Cheating was no fun, I liked to get my stats the “legitimate” way. But I knew officers who kept a little baggie of whatever or maybe a pocket knife that was a little too big in their war bags (yeah, we called our dufflebags “war bags”…). Did I ever tell anybody about it? No I did not. Did I ever confess my suspicions when cocaine suddenly showed up in a gang member’s jacket? No I did not.
            In fact, let me tell you about an extremely formative experience: in my police academy class, we had a clique of around six trainees who routinely bullied and harassed other students: intentionally scuffing another trainee’s shoes to get them in trouble during inspection, sexually harassing female trainees, cracking racist jokes, and so on. Every quarter, we were to write anonymous evaluations of our squadmates. I wrote scathing accounts of their behavior, thinking I was helping keep bad apples out of law enforcement and believing I would be protected. Instead, the academy staff read my complaints to them out loud and outed me to them and never punished them, causing me to get harassed for the rest of my academy class. That’s how I learned that even police leadership hates rats. That’s why no one is “changing things from the inside.” They can’t, the structure won’t allow it.
            And that’s the point of what I’m telling you. Whether you were my sergeant, legally harassing an old woman, me, legally harassing our residents, my fellow trainees bullying the rest of us, or “the bad apples” illegally harassing “shitbags”, we were all in it together. I knew cops that pulled women over to flirt with them. I knew cops who would pepper spray sleeping bags so that homeless people would have to throw them away. I knew cops that intentionally provoked anger in suspects so they could claim they were assaulted. I was particularly good at winding people up verbally until they lashed out so I could fight them. Nobody spoke out. Nobody stood up. Nobody betrayed the code.
            None of us protected the people (you) from bad cops.
            This is why “All cops are bastards.” Even your uncle, even your cousin, even your mom, even your brother, even your best friend, even your spouse, even me. Because even if they wouldn’t Do The Thing themselves, they will almost never rat out another officer who Does The Thing, much less stop it from happening.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo7->id
        ]);
        $post8 = $author3->posts()->create([
            "title"=>"America Surrendered to Coronavirus — the Result is a Tidal Wave of Death",
            "short_description"=>"Go ahead and look at the chart above. What do you see? Here’s what you should see.
            Coronavirus in America has done something bizarre, nightmarish, and gruesome.
            America’s line towers over the rest of the world. And then, unlike many other countries, rich and poor, it doesn’t decline. It doesn’t crest, like a wave. Instead, it plateaus.
            The only accurate way to describe it, I think is this. America has had a tsunami of death.
            Americans struggle these days, asking: is this the first wave? What about the second wave? The descriptions feel wrong because they are. America doesn’t have a wave. America has a tsunami.",
            "content"=>"There’s a very, very big difference.
            Do you see how odd that chart looks? How it’s strangely, grotesquely misshapen, lopsided, humpbacked? It doesn’t look like a wave because it’s not one. No crest, no trough. It is something else entirely, that points to a very different story unfolding.
            The strange, unfamiliar, weird shape of this chart — it contains multitudes. It tells the story of a catastrophic, terrible, and needless tragedy — one so surreal that I have to reach back into history to really explain it well. Let me begin here.
            When we encounter a pandemic, we — modern people — expect something like a wave. We instinctively look for one. We see in our minds something like this. An exponential rise, a crest, and a rapid fall. That never happened in America, and it is not about to happen anytime soon, but we’ll get to that.
            The wave is the shape we expect in this day and age when it comes to a pandemic for one of two reasons. One, some killer diseases, like Ebola, burn themselves out — let’s leave those aside for now. Two, measures are put in place to “flatten” the exponentially rising curve. Hence, the shape of a wave — a rising crest, and a falling trough — develops. A disease spreads, and we tamp it down. If we’re very good at this — preventative measures, limiting the spread of a disease, and so forth — then we get a proper wave. We have “crunched” the curve — meaning we’ve produced a recognizable trough. Or at least we’ve flattened it, meaning we’ve made the crest fall.
            That’s what happened in many countries, from New Zealand to South Korea to Vietnam. They tested, traced, took swift, decisive action. The wave-shape emerged. Explosive rise — sudden, swift fall. Crunch. Others flattened the curve — Italy, France, Germany. Not quite such a symmetrical wave — but a decisive decline, nonetheless.
            Here’s my point. We’re used to thinking of “waves” precisely because we ‘re lucky enough to live in an age in which we can combat and thwart disease, quickly and decisively. Waves are things we make.
            But it wasn’t always like this.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo8->id
        ]);

        $post9 = $author1->posts()->create([
            "title"=>"Why Some People Don’t Feel Lonely",
            "short_description"=>"arguing with a men’s rights activist. I’d been invited to host a panel called “My Body Is NSFW,” about the issue of censorship and erasure of fat bodies in media. I’d pitched the panel based on an article I’d written for my column, The Anti-Diet Project. Beside me sat Nicolette Mason and Gabi Gregg — both iconic media figures and personal heroines of mine — whom I’d invited to join as my panelists. As a fangirl, it was the thrill of a lifetime. Furthermore, they’d been speaking out about body positivity long before it was a buzzword (and doing so as a queer and Black woman, respectively). The event had gone beautifully thus far: a passionate discussion about unconscious bias, intersectionality, the progress made by those of us in the body positive movement, and the urgent work still yet to be done to dismantle systemic anti-fat stigma.",
            "content"=>"It didn’t end fatphobia because it did not center the racism at its core.
            Fatphobia’s hideous origin story is perhaps best laid out in the groundbreaking 2019 book Fearing the Black Body, by sociologist Sabrina Strings, PhD. In it, Strings points out that while most people assume our cultural disdain for fatness is a product of health concerns, “[fatphobia] precedes the medical establishment’s concerns about excess weight by nearly 100 years…it’s actually rooted in the trans-Atlantic slave trade and Protestantism.” The slave trade spread the false notion of Black voraciousness, while Protestantism railed against gluttony, preaching purity through restriction and temperance, Strings argues. Thus thinness came to symbolize the highest ideals of white western Europe, while fatness became a mark of both racial and moral impurity. And, like slavery and Protestantism, this concept was laid into the foundation of white America.
            Fatphobia has been leveled as a weapon against virtually every marginalized American population since colonization. Strings states that generations of interracial sex in American colonies meant that by the 19th century, skin color was “a poor sorting mechanism” for determining race. But fatness, on the other hand, was so fundamentally linked with Blackness in cultural consciousness, that simply being fat — or just not thin — became an indicator of racial inferiority. This, she says, is how many immigrant populations from the Irish to Russian Jews came to be treated as “part-Black” and therefore denigrated by white American society.
            But no one in this country has suffered so long and so brutally the monstrous effects of fatphobia more than fat Black Americans. Centuries later, it remains an insidious form of white oppression: Black people are redlined and ghettoized into neighborhoods with more pollution and less accessible health care and fewer food options, then have their health problems dismissed by the medical system as simply their own fat faults. The Black death rate from Covid-19 is approximately 3.6 times higher than that of white Americans — a statistic often cited as a direct result of obesity, though there is no data at this point to back up such a claim.
            And indeed, fatness has even been used to defend police officers charged (or not) with the killing of Black men. In 2019, NYPD Officer Daniel Pantaleo sat through disciplinary hearings five years after putting Eric Garner in a fatal chokehold, for which he was never charged or fired. In his defense, Pantaleo’s lawyer said, “[Garner] was a ticking time bomb that resisted arrest. If he was put in a bear hug, it [death] would have been the same outcome.” This he said in direct contradiction of the medical examiner’s report.
            “The realities of fatphobia extend far beyond what most body positivity rhetoric typically addresses,” wrote Sherronda J. Brown, the managing editor of Wear Your Voice, in a searing response piece to Pantaleo’s defense. Mainstream body positive advocates denounced fatphobia as an issue of racist and stigmatizing beauty standards, she continued: “While this is indeed one part of how fatphobia manifests in our lives, it is not its main function… The true function of fatphobia is to dehumanize and debase.” And though it is weaponized as such against fat people of all races, it is inherently anti-Black and innately racist, having been invented and disseminated by white people as a means of denigrating Black people. Our contemporary bias against fat people is the direct descendent of our overt dehumanization of Black people. To hate fat bodies is to hate bodies that seem “Black.” But crucially, when a white person — especially a white, able-bodied, upper-middle-class, straight, cisgender person with a job at a fancy website — is marginalized by fatphobia, they are also protected from the worst of it by a thick cushion of privilege.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo9->id
        ]);
        $post10 = $author3->posts()->create([
            "title"=>"Coronavirus May Be a Blood Vessel Disease, Which Explains Everything",
            "short_description"=>"A Feeling socially connected is a need all of us share, but human interaction isn’t the only way to get it",
            "content"=>"If we don’t, or couldn’t, take measures, though — fast, strong, quick enough — what happens? Well, centuries ago, there would just be an exponential rise, and then a long, long decay. The rise might take a year or two — but then that disease might take a very, very long time to go away. How long? In the middle ages, for example, it took centuries for the plague to finally relent. From their perspective, “waves” would recur every five years or ten years or so — but looking at it over time, we’d see the strange, misshapen hump of a tsunami, with water bubbling on top, a disease that spread like wildfire — but plateaued, before decaying.
             Think of a disease like smallpox. Sometime in the deep past, it emerged. Bang! There wasn’t a wave. There was an explosion, and then a tsunami. One that never really relented, until the 1970s, after the invention of the smallpox vaccine. Before that, smallpox just took up permanent residence in the human population, at a stable level of infection. No wave. Just a terrible plateau, that went on generation after generation. See the difference?",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo10->id
        ]);
        $post11 = $author2->posts()->create([
            "title"=>"HOW TO BE A BASTARD",
            "short_description"=>"I have participated in some of these activities personally, others are ones I either witnessed personally or heard officers brag about openly. Very, very occasionally, I knew an officer who was disciplined or fired for one of these things.",
            "content"=>"Police officers will lie about the law, about what’s illegal, or about what they can legally do to you in order to manipulate you into doing what they want.
            Police officers will lie about feeling afraid for their life to justify a use of force after the fact.
            Police officers will lie and tell you they’ll file a police report just to get you off their back.
            Police officers will lie that your cooperation will “look good for you” in court, or that they will “put in a good word for you with the DA.” The police will never help you look good in court.
            Police officers will lie about what they see and hear to access private property to conduct unlawful searches.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo11->id
        ]);
        $post12 = $author1->posts()->create([
            "title"=>"Congratulate and thank to Maryam for joining our team",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo12->id
        ]);

        $post13 = $author1->posts()->create([
            "title"=>"If Covid-19 is a vascular disease, the best antiviral therapy might not be antiviral therapy",
            "short_description"=>"An alternative theory is that the blood clotting and symptoms in other organs are caused by inflammation in the body due to an over-reactive immune response — the so-called cytokine storm. This inflammatory reaction can occur in other respiratory illnesses and severe cases of pneumonia, which is why the initial reports of blood clots, heart complications, and neurological symptoms didn’t sound the alarm bells. However, the magnitude of the problems seen with Covid-19 appear to go beyond the inflammation experienced in other respiratory infections.
            “There is some increased propensity, we think, of clotting happening with these [other] viruses. I think inflammation in general promotes that,” Sethi says. “Is this over and above or unique for SARS-CoV-2, or is that just because [the infection] is just that much more severe? I think those are all really good questions that unfortunately we don’t have the answer to yet.”",
            "content"=>"Anecdotally, Sethi says the number of requests he received as the director of the pulmonary embolism response team, which deals with blood clots in the lungs, in April 2020 was two to three times the number in April 2019. The question he’s now trying to answer is whether that’s because there were simply more patients at the hospital during that month, the peak of the pandemic, or if Covid-19 patients really do have a higher risk for blood clots.
            “I suspect from what we see and what our preliminary data show is that this virus has an additional risk factor for blood clots, but I can’t prove that yet,” Sethi says.
            The good news is that if Covid-19 is a vascular disease, there are existing drugs that can help protect against endothelial cell damage. In another New England Journal of Medicine paper that looked at nearly 9,000 people with Covid-19, Mehra showed that the use of statins and ACE inhibitors were linked to higher rates of survival. Statins reduce the risk of heart attacks not only by lowering cholesterol or preventing plaque, they also stabilize existing plaque, meaning they’re less likely to rupture if someone is on the drugs.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo13->id
        ]);
        $post14 = $author3->posts()->create([
            "title"=>"Police officer for nearly ten years",
            "short_description"=>"I was a police officer for nearly ten years and I was a bastard. We all were.
            This essay has been kicking around in my head for years now and I’ve never felt confident enough to write it. It’s a time in my life I’m ashamed of. It’s a time that I hurt people and, through inaction, allowed others to be hurt. It’s a time that I acted as a violent agent of capitalism and white supremacy. Under the guise of public safety, I personally ruined people’s lives but in so doing, made the public no safer… so did the family members and close friends of mine who also bore the badge alongside me.
            But enough is enough.",
            "content"=>"The reforms aren’t working. Incrementalism isn’t happening. Unarmed Black, indigenous, and people of color are being killed by cops in the streets and the police are savagely attacking the people protesting these murders.
            American policing is a thick blue tumor strangling the life from our communities and if you don’t believe it when the poor and the marginalized say it, if you don’t believe it when you see cops across the country shooting journalists with less-lethal bullets and caustic chemicals, maybe you’ll believe it when you hear it straight from the pig’s mouth.
            WHY AM I WRITING THIS
            As someone who went through the training, hiring, and socialization of a career in law enforcement, I wanted to give a first-hand account of why I believe police officers are the way they are. Not to excuse their behavior, but to explain it and to indict the structures that perpetuate it.",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo14->id
        ]);
        $post15 = $author2->posts()->create([
            "title"=>"ALL COPS ARE BASTARDS",
            "short_description"=>"I was a police officer in a major metropolitan area in California with a predominantly poor, non-white population (with a large proportion of first-generation immigrants). One night during briefing, our watch commander told us that the city council had requested a new zero tolerance policy. Against murderers, drug dealers, or child predators?
            No, against homeless people collecting cans from recycling bins.
            See, the city had some kickback deal with the waste management company where waste management got paid by the government for our expected tonnage of recycling. When homeless people “stole” that recycling from the waste management company, they were putting that cheaper contract in peril. So, we were to arrest as many recyclers as we could find.",
            "content"=>"Even for me, this was a stupid policy and I promptly blew Sarge off. But a few hours later, Sarge called me over to assist him. He was detaining a 70 year old immigrant who spoke no English, who he’d seen picking a coke can out of a trash bin. He ordered me to arrest her for stealing trash. I said, “Sarge, c’mon, she’s an old lady.” He said, “I don’t give a shit. Hook her up, that’s an order.” And… I did. She cried the entire way to the station and all through the booking process. I couldn’t even comfort her because I didn’t speak Spanish. I felt disgusting but I was ordered to make this arrest and I wasn’t willing to lose my job for her.
            If you’re tempted to feel sympathy for me, don’t. I used to happily hassle the homeless under other circumstances. I researched obscure penal codes so I could arrest people in homeless encampments for lesser known crimes like “remaining too close to railroad property” (369i of the California Penal Code). I used to call it “planting warrant seeds” since I knew they wouldn’t make their court dates and we could arrest them again and again for warrant violations.
            We used to have informal contests for who could cite or arrest someone for the weirdest law. DUI on a bicycle, non-regulation number of brooms on your tow truck (27700(a)(1) of the California Vehicle Code)… shit like that. For me, police work was a logic puzzle for arresting people, regardless of their actual threat to the community. As ashamed as I am to admit it, it needs to be said: stripping people of their freedom felt like a game to me for many years.
            I know what you’re going to ask: did I ever plant drugs? Did I ever plant a gun on someone? Did I ever make a false arrest or file a false report? Believe it or not, the answer is no. Cheating was no fun, I liked to get my stats the “legitimate” way. But I knew officers who kept a little baggie of whatever or maybe a pocket knife that was a little too big in their war bags (yeah, we called our dufflebags “war bags”…). Did I ever tell anybody about it? No I did not. Did I ever confess my suspicions when cocaine suddenly showed up in a gang member’s jacket? No I did not.
            In fact, let me tell you about an extremely formative experience: in my police academy class, we had a clique of around six trainees who routinely bullied and harassed other students: intentionally scuffing another trainee’s shoes to get them in trouble during inspection, sexually harassing female trainees, cracking racist jokes, and so on. Every quarter, we were to write anonymous evaluations of our squadmates. I wrote scathing accounts of their behavior, thinking I was helping keep bad apples out of law enforcement and believing I would be protected. Instead, the academy staff read my complaints to them out loud and outed me to them and never punished them, causing me to get harassed for the rest of my academy class. That’s how I learned that even police leadership hates rats. That’s why no one is “changing things from the inside.” They can’t, the structure won’t allow it.
            And that’s the point of what I’m telling you. Whether you were my sergeant, legally harassing an old woman, me, legally harassing our residents, my fellow trainees bullying the rest of us, or “the bad apples” illegally harassing “shitbags”, we were all in it together. I knew cops that pulled women over to flirt with them. I knew cops who would pepper spray sleeping bags so that homeless people would have to throw them away. I knew cops that intentionally provoked anger in suspects so they could claim they were assaulted. I was particularly good at winding people up verbally until they lashed out so I could fight them. Nobody spoke out. Nobody stood up. Nobody betrayed the code.
            None of us protected the people (you) from bad cops.
            This is why “All cops are bastards.” Even your uncle, even your cousin, even your mom, even your brother, even your best friend, even your spouse, even me. Because even if they wouldn’t Do The Thing themselves, they will almost never rat out another officer who Does The Thing, much less stop it from happening.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo15->id
        ]);
        $post16 = $author3->posts()->create([
            "title"=>"Coronavirus — the Result is a Tidal Wave of Death",
            "short_description"=>"America’s line towers over the rest of the world. And then, unlike many other countries, rich and poor, it doesn’t decline. It doesn’t crest, like a wave. Instead, it plateaus.
            The only accurate way to describe it, I think is this. America has had a tsunami of death.
            Americans struggle these days, asking: is this the first wave? What about the second wave? The descriptions feel wrong because they are. America doesn’t have a wave. America has a tsunami.",
            "content"=>" It doesn’t look like a wave because it’s not one. No crest, no trough. It is something else entirely, that points to a very different story unfolding.
            The strange, unfamiliar, weird shape of this chart — it contains multitudes. It tells the story of a catastrophic, terrible, and needless tragedy — one so surreal that I have to reach back into history to really explain it well. Let me begin here.
            When we encounter a pandemic, we — modern people — expect something like a wave. We instinctively look for one. We see in our minds something like this. An exponential rise, a crest, and a rapid fall. That never happened in America, and it is not about to happen anytime soon, but we’ll get to that.
            The wave is the shape we expect in this day and age when it comes to a pandemic for one of two reasons. One, some killer diseases, like Ebola, burn themselves out — let’s leave those aside for now. Two, measures are put in place to “flatten” the exponentially rising curve. Hence, the shape of a wave — a rising crest, and a falling trough — develops. A disease spreads, and we tamp it down. If we’re very good at this — preventative measures, limiting the spread of a disease, and so forth — then we get a proper wave. We have “crunched” the curve — meaning we’ve produced a recognizable trough. Or at least we’ve flattened it, meaning we’ve made the crest fall.
            That’s what happened in many countries, from New Zealand to South Korea to Vietnam. They tested, traced, took swift, decisive action. The wave-shape emerged. Explosive rise — sudden, swift fall. Crunch. Others flattened the curve — Italy, France, Germany. Not quite such a symmetrical wave — but a decisive decline, nonetheless.
            Here’s my point. We’re used to thinking of “waves” precisely because we ‘re lucky enough to live in an age in which we can combat and thwart disease, quickly and decisively. Waves are things we make.
            But it wasn’t always like this.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo16->id
        ]);

    }
}
