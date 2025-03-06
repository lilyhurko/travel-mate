<?php
include_once __DIR__ . '/../config/db.php';

$pdo = getPDO();

if (!$pdo) {
    die("Database connection failed.");
}

$query = "SELECT id, name, description, route_type FROM user_routes WHERE visibility = 'public'";
$stmt = $pdo->query($query);

$dashboardRoutes = [];
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $route) {
    $dashboardRoutes[$route['id']] = $route;
}

$routeDetails = [
    85 => "This Alpine adventure takes you through stunning landscapes, showcasing majestic peaks like Mont Blanc and the Matterhorn. 
    Key routes include the Tour du Mont Blanc, which loops around the massif, offering breathtaking views of glaciers, valleys, 
    and picturesque villages. The Haute Route, connecting Chamonix to Zermatt, is another iconic trail, ideal for experienced hikers,
    with panoramic vistas of towering mountains and alpine meadows. 
    Along the way, you’ll pass tranquil lakes, enjoy local cuisine in charming mountain huts, and immerse yourself in the unique culture of the Alps.",
    86 => "Start your journey in Milan, Italy, exploring its iconic landmarks like the Duomo and Galleria Vittorio Emanuele II, 
    and discovering charming neighborhoods like Brera. Then, head to Lake Como for scenic lakeside villages such as Bellagio and Varenna, 
    with stunning views and historic villas. Cross into Switzerland, visiting Lugano for lakeside walks and cultural sites, 
    and Bellinzona for medieval castles and vibrant markets. Finally, end your tour in Zermatt, 
    a picturesque village at the base of the Matterhorn, offering breathtaking mountain views and alpine charm.",
    87 => "Embark on a Coastal Escape through southern Europe, starting with the stunning Amalfi Coast in Italy. 
    Visit the picturesque village of Positano, then explore Ravello's panoramic views, Amalfi's cathedral, and the peaceful village of Atrani. 
    Next, head to the breathtaking Cinque Terre, with its five charming villages offering colorful streets, beaches, and scenic hiking trails.
     Cross into France’s French Riviera, where you can enjoy the glamorous city of Nice, the hilltop village of Eze, and the famous resort town of Cannes. 
    This coastal journey promises scenic beauty, cultural charm, and tranquil seaside experiences.",
    88 => "Embark on a Bukovel Adventure, a winter wonderland perfect for skiing and snowboarding in the Carpathian Mountains of Ukraine. 
    Start in Bukovel, Eastern Europe's largest ski resort, offering a variety of slopes, modern ski lifts, and vibrant après-ski experiences. 
    Then, explore nearby Yaremche with its scenic landscapes and Probiy Waterfall, enjoy winter hiking and stunning views at Dovbush Rocks, 
    and relax in the tranquil village of Tatariv. 
    This journey offers a mix of winter sports, natural beauty, and local culture, making for an unforgettable adventure.",
    89 => "Embark on an Alanya Discovery, a sunny escape with beautiful beaches and rich history. 
    Relax on Cleopatra Beach, famous for its golden sands and clear waters. 
    Hike or take a cable car to Mount Cleopatra, where you can visit Alanya Castle and enjoy stunning panoramic views. 
    Finish your journey by exploring the fascinating Damlatas Cave, known for its healing air and unique formations. 
    This trip offers a perfect blend of relaxation, adventure, and culture.",
    90 => "Embark on an Arizona Canyons Exploration, discovering the breathtaking landscapes of the American Southwest. 
    Start with the iconic Grand Canyon, where you can take in its awe-inspiring views and hike along its rim. Next, visit Antelope Canyon, 
    known for its stunning narrow passageways and vibrant red sandstone formations. 
    Finally, explore Horseshoe Bend, a dramatic meander of the Colorado River offering incredible photo opportunities. 
    This journey immerses you in the natural beauty and grandeur of Arizona’s canyons.",
    91 => "Embark on a Tenerife Escapade, a paradise for nature lovers with stunning beaches and volcanic landscapes. 
    Explore Teide National Park, home to Spain’s highest peak, the active volcano Mount Teide, and dramatic lava formations. 
    Relax on the black sand beaches of Los Cristianos, perfect for sunbathing and water activities. 
    Visit the lush Anaga Rural Park, known for its green forests, hiking trails, and breathtaking viewpoints. 
    Tenerife offers a perfect mix of natural beauty and outdoor adventure.",
    92 => "Embark on a Madeira Adventure, exploring the island’s stunning mountains, valleys, and ocean views. 
    Visit the breathtaking Laurisilva Forest, a UNESCO World Heritage site with lush, ancient forests and hiking trails. 
    Explore the picturesque Monte, where you can take in panoramic views and visit the beautiful Monte Palace. 
    Finally, relax at Porto Moniz Natural Swimming Pools, unique volcanic rock pools filled with crystal-clear ocean water. 
    Madeira offers a perfect blend of natural beauty and outdoor exploration.",
    93 => "Embark on a Spain Cultural Journey, discovering the country’s rich history, from ancient castles to vibrant cities. 
    Explore the majestic Alhambra in Granada, a stunning palace and fortress complex showcasing Moorish architecture. 
    Visit Toledo, a UNESCO World Heritage city known for its medieval architecture and rich cultural heritage. 
    End your journey in Barcelona, where you can admire the unique works of architect Antoni Gaudí, including the famous Sagrada Familia. 
    Spain offers a captivating mix of history, art, and culture.",
    94 => "Embark on an Italy: Rome & Beyond journey, exploring the ancient ruins and art of three iconic cities. 
    In Rome, visit the awe-inspiring Colosseum, the historic Roman Forum, and the Vatican Museums, home to Michelangelo’s Sistine Chapel. 
    In Florence, discover Renaissance masterpieces, including David by Michelangelo and the art-filled Uffizi Gallery. 
    Finally, experience the romantic canals of Venice, with a gondola ride and a visit to the magnificent St. Mark’s Basilica. 
    This trip combines ancient history, art, and timeless beauty across Italy’s most famous cities.",
    95 => "Experience French Riviera Glamour, where luxury meets stunning beaches along the south of France. 
    Start in Nice, with its iconic Promenade des Anglais, pebbled beaches, and vibrant Old Town. 
    Head to the glamorous city of Cannes, famous for its film festival and luxurious beachfront. 
    Finally, explore the opulence of Monaco, where you can visit the lavish Palace of Monaco, 
    stroll through the Casino de Monte-Carlo, and relax by the pristine Mediterranean waters. 
    This journey promises elegance, beautiful landscapes, and unforgettable coastal charm.",
    96 => "Embark on a Swiss Alps Hiking adventure, where breathtaking views and fresh alpine air await. 
    Start with a hike to Zermatt and the iconic Matterhorn, enjoying stunning mountain panoramas along well-marked trails. 
    Next, explore the Jungfrau Region, hiking through lush meadows and snow-capped peaks, 
    with scenic routes like the Eiger Trail offering breathtaking views. 
    Finally, visit Grindelwald, a picturesque mountain village with easy access to hiking paths leading to glaciers and majestic alpine lakes. 
    This journey combines natural beauty, outdoor adventure, and serene landscapes.",
    97 => "Embark on a Norwegian Fjords Adventure, where you can cruise through some of the most stunning and dramatic landscapes in the world. 
    Start in Geirangerfjord, a UNESCO World Heritage site known for its steep cliffs, waterfalls, and serene waters. 
    Continue to Nærøyfjord, one of the narrowest and most picturesque fjords, surrounded by towering mountains and lush greenery. 
    End your journey in Sognefjord, the longest and deepest fjord in Norway, offering breathtaking views of glaciers, forests, and charming villages. 
    This adventure promises an unforgettable experience of Norway’s natural beauty.",
    98 => "Embark on a Kyoto Temples and Gardens journey, immersing yourself in the serenity of Japan’s ancient capital. 
    Visit the majestic Kinkaku-ji (Golden Pavilion), where its shimmering reflection in the surrounding pond creates a peaceful atmosphere. 
    Explore Ryoan-ji, home to the famous Zen rock garden that invites contemplation. 
    Wander through the lush Kiyomizu-dera, perched on a hill with sweeping views of the city and its historic streets. 
    Lastly, stroll through the beautiful Zen Gardens of Nanzen-ji, where tranquility and natural beauty blend harmoniously. 
    This journey offers a deep connection with Kyoto's cultural heritage and natural serenity.",
    99 => "Embark on a New Zealand Nature Expedition, where you'll explore the country's diverse and breathtaking landscapes. 
    Start in Abel Tasman National Park, known for its golden beaches, clear waters, and lush forests—perfect for hiking or kayaking. 
    Head to Fiordland National Park and cruise through the stunning Milford Sound, surrounded by towering cliffs and waterfalls. 
    Finally, explore the Southern Alps, where you can hike or take scenic flights over snow-capped peaks, glaciers, and alpine lakes. 
    This journey promises an unforgettable experience of New Zealand’s natural wonders.",
    100 => "Embark on an Icelandic Wonders tour, discovering the island’s extraordinary landscapes, from glaciers to geysers. 
    Start at Þingvellir National Park, a UNESCO World Heritage site, 
    where you can see the rift between two tectonic plates and explore the historic Althing, 
    the world’s oldest parliament. Next, visit Gullfoss, a powerful waterfall, and the nearby Geysir Hot Springs, 
    home to the famous erupting Strokkur Geyser. Finally, explore Jökulsárlón Glacier Lagoon, 
    where massive icebergs float in crystal-clear waters, and enjoy a boat ride among the ice formations. 
    Iceland’s natural beauty will leave you in awe.",
    101 => "Escape to Bali Paradise, where stunning beaches, 
    ancient temples, and lush natural beauty await. Start with the famous Uluwatu Temple, 
    perched on a cliff with breathtaking ocean views and spectacular sunsets. Spend time on the golden sands of Seminyak Beach, 
    perfect for relaxing or surfing. Explore the lush rice terraces of Tegallalang, where vibrant green fields create a serene and picturesque 
    landscape. End your journey in Sacred Monkey Forest Sanctuary in Ubud, 
    home to playful monkeys and surrounded by tranquil jungle. Bali offers the perfect blend of relaxation, culture, and nature.",
    102 => "Embark on a Dubai Luxury Escape, where modern architecture and extravagant luxury await. 
    Start by visiting the iconic Burj Khalifa, the world’s tallest building, offering stunning views from its observation deck. 
    Explore the opulent Dubai Mall, home to high-end boutiques, an aquarium, and a skating rink. 
    Spend time at Palm Jumeirah, a man-made island with luxury resorts and private beaches, and enjoy a sunset dinner at the exclusive Atlantis The Palm. 
    End your journey with a visit to the Burj Al Arab, the world-famous seven-star hotel, for a taste of ultimate luxury. 
    This escape offers a perfect mix of modernity, luxury, and unforgettable experiences.",
    103 => "Experience Santorini Sunset Views, where iconic sunsets and picturesque whitewashed buildings create a dreamy atmosphere. 
    Start your journey in Oia, known for its stunning sunsets, where the sun dips below the Aegean Sea, painting the sky in vibrant colors. 
    Wander through the narrow streets of Fira, with its charming shops and cafes offering panoramic views of the caldera. 
    Relax on the unique black sand beaches of Kamari and Perissa, and enjoy the peaceful beauty of the island. 
    Santorini offers a perfect blend of natural beauty, rich history, and unforgettable sunsets.",
    104 => "Escape to a Thailand Beach Retreat, where you can bask in the sun on some of the world’s most stunning beaches with crystal-clear waters. 
    Start in Phuket, Thailand's largest island, known for its lively Patong Beach and quieter spots like Kata and Karon. 
    Head to Krabi and visit Railay Beach, with its dramatic limestone cliffs and turquoise waters, perfect for rock climbing and relaxing by the sea. 
    Finally, explore the beautiful Phi Phi Islands, renowned for their breathtaking beaches, crystal-clear water, and vibrant marine life, 
    ideal for snorkeling and diving. 
    Thailand offers the ultimate tropical beach experience.",
    105 => "Embark on a Peru Adventure, where you can trek through ancient landscapes and explore Incan history. 
    Start with a visit to Machu Picchu, the iconic lost city of the Incas, 
    where you can hike the Inca Trail or take a scenic train ride to reach the breathtaking ruins. 
    Explore the Sacred Valley, home to charming towns like Ollantaytambo and the impressive Moray terraces, once used for agricultural experiments. 
    End your adventure in Cusco, the former Incan capital, where you can wander through cobblestone streets, visit the historic Sacsayhuamán ruins,
    and experience rich local culture. Peru offers a perfect mix of history, adventure, and natural beauty.",
    106 => "Embark on a Japan Cultural Discovery, where you can experience the country’s rich heritage, from ancient temples to vibrant cities. 
    Start in Kyoto, home to stunning temples like the Golden Pavilion (Kinkaku-ji) and the peaceful Kiyomizu-dera, 
    along with traditional tea houses and Zen gardens. Head to Tokyo, a bustling metropolis known for its mix of futuristic architecture, 
    historic shrines like Senso-ji Temple, and vibrant neighborhoods such as Shibuya and Shinjuku. 
    End your journey in Nara, home to the majestic Todai-ji Temple and the friendly roaming deer in Nara Park. 
    This journey combines ancient traditions with modern excitement.",
    107 => "Embark on an Australia Outback Expedition, where you can discover the rugged beauty of the Australian outback and iconic landmarks. 
    Start with Uluru (Ayers Rock), the majestic red monolith in Kata Tjuta National Park, and experience its stunning sunrise and sunset views. 
    Explore the unique rock formations of Kings Canyon in Watarrka National Park, 
    where you can hike along the rim for breathtaking views of the desert landscape. Finally, visit Alice Springs,
    a remote town that serves as a gateway to the outback, offering cultural experiences and access to the MacDonnell Ranges, 
    where you can enjoy hiking, wildlife spotting, and swimming in waterholes. 
    This adventure combines natural wonders and Indigenous culture for an unforgettable experience.",
    108 => "Embark on a Greece Ancient Wonders journey, exploring the iconic ruins and historic sites of this ancient civilization. 
    Start in Athens, where you can visit the magnificent Acropolis, including the Parthenon and Temple of Hephaestus, 
    offering a glimpse into Greece's glorious past. Next, head to Crete, the birthplace of the Minoan civilization, 
    and explore the ancient Palace of Knossos, a vast archaeological site with fascinating frescoes and ruins. 
    Finally, visit Rhodes, home to the ancient Acropolis of Lindos and the remains of the legendary Colossus of Rhodes, 
    one of the Seven Wonders of the Ancient World. 
    This journey immerses you in the rich history and timeless beauty of Greece.",
    109 => "Embark on a Portugal Coastal Adventure, exploring the country’s stunning coastline from Lisbon to Porto. 
    Start in Lisbon, where you can stroll through the historic Alfama District, 
    visit the Belém Tower, and enjoy the vibrant Baixa neighborhood. Head to the Sintra region, just outside Lisbon, 
    to explore the magical Pena Palace and the dramatic cliffs of Cabo da Roca. Continue north to Porto, 
    known for its riverside charm, the iconic Ribeira District, and the historic Dom Luís I Bridge. 
    Enjoy the local wine at a traditional Port Wine Cellar and take a scenic boat cruise along the Douro River. 
    This coastal adventure offers a perfect blend of history, culture, and coastal beauty.",
    110 => "Embark on an Egypt: Pyramids & History journey, where you’ll uncover the mysteries of Ancient Egypt through iconic landmarks and ancient wonders.
     Start in Giza, home to the world-famous Pyramids of Giza and the Sphinx, where you can explore the Great Pyramid and the rich history behind these incredible structures. 
    Next, visit the awe-inspiring Temple of Karnak in Luxor, one of the largest religious complexes in the world, and explore the nearby Valley of the Kings, where tombs of pharaohs, 
    including Tutankhamun, are hidden in the desert cliffs. Finally, 
    discover the monumental Abu Simbel temples, carved into rock and dedicated to Ramses II. 
    This journey offers an unforgettable exploration of Egypt’s ancient civilization and its wonders.",
    111 => "Escape to a Maldives Beach Getaway, where luxury resorts and crystal-clear waters offer the ultimate relaxation. 
    Stay in overwater bungalows that provide direct access to the pristine turquoise lagoon, and unwind on white sandy beaches surrounded by lush palm trees. 
    Enjoy activities like snorkeling and diving, exploring vibrant coral reefs and diverse marine life. 
    Visit Malé, the capital, to experience its rich culture, or indulge in a spa day at one of the world-class resorts. 
    Whether you're seeking tranquility or adventure, the Maldives offers an idyllic paradise for all.",
    112 => "Embark on a Hawaii Volcano Adventure, where you’ll explore the island’s dramatic volcanic landscapes. 
    Start at Hawai'i Volcanoes National Park on the Big Island, home to the active Kīlauea volcano and the Halemaʻumaʻu Crater, 
    where you can hike through steam vents and lava tubes. Visit the stunning Devastation Trail, 
    which takes you through areas shaped by past eruptions. Then, relax on the black sand beaches of Punaluʻu, 
    formed by volcanic activity, and enjoy the contrast of the rugged landscape and crystal-clear waters. 
    This adventure offers an unforgettable experience of nature’s raw power and beauty.",
    113 => "Embark on a Croatia Island Hopping adventure, exploring the stunning coastline and charming medieval towns. 
    Start in Split, where you can visit the ancient Diocletian's Palace, and then head to the beautiful island of Hvar, 
    known for its vibrant nightlife and scenic beaches. Continue to Korčula, often called the 'miniature Dubrovnik',
     with its medieval walls and quaint old town. Explore Vis, 
     an unspoiled island with pristine beaches and the famous Blue Cave. End your journey in Dubrovnik,
     where you can wander through the historic old town, a UNESCO World Heritage site, and enjoy views of the Adriatic Sea. 
     This island-hopping adventure offers a perfect blend of history, culture, and natural beauty."
];

$routeImages = [
    85 => ['/images/route1-1.jpg', '/images/route1-2.jpg', '/images/route1-3.jpg'],
    86 => ['/images/route2-1.jpg', '/images/route2-2.jpg', '/images/route2-3.jpg'],
    87 => ['/images/route3-1.jpg', '/images/route3-2.jpg', '/images/route3-3.jpg'],
    88 => ['/images/route4-1.jpg', '/images/route4-2.jpg', '/images/route4-3.jpg'],
    89 => ['/images/route5-1.jpg', '/images/route5-2.jpg', '/images/route5-3.jpg'],
    90 => ['/images/route6-1.jpg', '/images/route6-2.jpg', '/images/route6-3.jpg'],
    91 => ['/images/route7-1.jpg', '/images/route7-2.jpg', '/images/route7-3.jpg'],
    92 => ['/images/route8-1.jpg', '/images/route8-2.jpg', '/images/route8-3.jpg'],
    93 => ['/images/route9-1.jpg', '/images/route9-2.jpg', '/images/route9-3.jpg'],
    94 => ['/images/route10-1.jpg', '/images/route10-2.jpg', '/images/route10-3.jpg'],
    95 => ['/images/route11-1.jpg', '/images/route11-2.jpg', '/images/route11-3.jpg'],
    96 => ['/images/route12-1.jpg', '/images/route12-2.jpg', '/images/route12-3.jpg'],
    97 => ['/images/route13-1.jpg', '/images/route13-2.jpg', '/images/route13-3.jpg'],
    98 => ['/images/route14-1.jpg', '/images/route14-2.jpg', '/images/route14-3.jpg'],
    99 => ['/images/route15-1.jpg', '/images/route15-2.jpg', '/images/route15-3.jpg'],
    100 => ['/images/route16-1.jpg', '/images/route16-2.jpg', '/images/route16-3.jpg'],
    101 => ['/images/route17-1.jpg', '/images/route17-2.jpg', '/images/route17-3.jpg'],
    102 => ['/images/route18-1.jpg', '/images/route18-2.jpg', '/images/route18-3.jpg'],
    103 => ['/images/route19-1.jpg', '/images/route19-2.jpg', '/images/route19-3.jpg'],
    104 => ['/images/route20-1.jpg', '/images/route20-2.jpg', '/images/route20-3.jpg'],
    105 => ['/images/route21-1.jpg', '/images/route21-2.jpg', '/images/route21-3.jpg'],
    106 => ['/images/route22-1.jpg', '/images/route22-2.jpg', '/images/route22-3.jpg'],
    107 => ['/images/route23-1.jpg', '/images/route23-2.jpg', '/images/route23-3.jpg'],
    108 => ['/images/route24-1.jpg', '/images/route24-2.jpg', '/images/route24-3.jpg'],
    109 => ['/images/route25-1.jpg', '/images/route25-2.jpg', '/images/route25-3.jpg'],
    110 => ['/images/route26-1.jpg', '/images/route26-2.jpg', '/images/route26-3.jpg'],
    111 => ['/images/route27-1.jpg', '/images/route27-2.jpg', '/images/route27-3.jpg'],
    112 => ['/images/route28-1.jpg', '/images/route28-2.jpg', '/images/route28-3.jpg'],
    113 => ['/images/route29-1.jpg', '/images/route29-2.jpg', '/images/route29-3.jpg'],
];

foreach ($dashboardRoutes as &$route) {
    $route['images'] = isset($routeImages[$route['id']]) ? $routeImages[$route['id']] : [];
    $route['details'] = isset($routeDetails[$route['id']]) ? $routeDetails[$route['id']] : 'Detailed description not available.';
}
unset($route);


?>
<script>
    const routesDetails = <?php echo json_encode(array_values($dashboardRoutes)); ?>;
    console.log(routesDetails);  // Перевірка, чи правильно передаються дані
</script>
