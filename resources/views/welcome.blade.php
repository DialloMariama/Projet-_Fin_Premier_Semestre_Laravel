<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            nav ul {
            display: inline-block;
            list-style: none;
            margin: 0;
            padding: 0;
            }

            nav li {
            display: inline-block;
            margin-right: 50px;
            }

            nav a {
            color: white;
            text-decoration: yellowgreen;
            font-weight: bold;
            font-size: 20px;
            }

            header {
            background-image: url('images/taxi11.jpg');
            background-size: cover;
            background-position: center;
            height: 400px;
            }
    
        </style>
    </head>
    <body class="antialiased">
    <header>
		<nav class>
			<ul >
                <li><a href="#">Accueil</a></li>
				<li><a href="#apropos">A propos</a></li>
				<li><a href="#passagers">Passager</a></li>
				<li><a href="#chauffeur">Chauffeurs</a></li>
				<li><a href="#business">Business Faster</a></li>
				<li><a href="#contact">Contact</a></li>
                @if (Route::has('login'))
                
                @auth
                <li><a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a></li>
                @else
                <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Se Connecter</a></li>
                
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">S'Inscrire</a></li>
                @endif
                @endauth
                @endif
                
			</ul>
		</nav>
        <div >
            <marquee behavior="" direction=""><h1 style="color: yellow; margin-top: 150px;">TAXI BOKKO</h1></marquee>
            <marquee behavior="" direction=""><h2 style="color: yellow; margin-top: 20px;">Bienvenue chez FASTER le vtp locale qui vous accompagne en toute sécurité dans tout vos projets</h2></marquee>
        </div>
    </header>
    <main>
        <section id="apropos">
            <h2 style="text-align: center;"><u>A PROPOS DE FASTER</u></h2>
            <div style="display:flex; flex-direction:row; justify-content:space-between; margin:40px;">
                <div style="flex-basis:70%;">
                    <img src="images/taxi5.jpg" alt="Description de l'image">
                </div>
                <div style="flex-basis:45%;">
                    <h1>Le meilleur choix de transport pour une agréable journée.</h1>
                    <p>Faster est le service VTC à la demande qui vous accompagnera en toute sécurité dans tous vos déplacements.</p>
                    <p>Via l’application FASTER vous pourrez commander votre chauffeur et vous déplacer 
                        vers la destination de votre choix en indiquant simplement la géolocalisation de votre destination finale</p>
                </div>
             </div>
	    </section>
		
        <section id="business">
            <h2 style="text-align: center;"><u>FASTER BUSINESS</u></h2>
            <div style="display:flex; flex-direction:row; justify-content:space-between; margin:40px;">
                <div style="flex-basis:50%; margin: 20px;">
                    <h1>Simplifiez vos déplacements professionnels ainsi que ceux de vos collaborateurs.</h1>
                    <p>Nos solutions Faster Business répondent à toutes vos problématiques de mobilité.</p>
                    <p>Activez l’application Faster, saisissez votre destination via géolocalisation puis validez le montant estimé de votre trajet.</p>
                    <p>Votre chauffeur Faster, vous récupère et vous dépose en toute sécurité à la destination indiquée</p>
                    <p>Vous recevrez votre facture et pourrez noter votre trajet et votre chauffeur.</p>
                </div>
                    <div style="flex-basis:50%;">
                        <img src="images/taxi3.jpg" alt="">
                    </div>
                </div>
            </section>
            <section id="passagers">
                 <h2 style="text-align: center;"> <u>DEVENIR PASSAGER</u></h2>
			<div style="display:flex; flex-direction:row; justify-content:space-between; margin:40px;">
                <div style="flex-basis:70%;">
                    <img src="images/taxi9.jpg" alt="Description de l'image">
                </div>
                <div style="flex-basis:45%;">
                    <h1>FASTER prend soin de ses passagers .</h1>
                    <p>Faster est le service VTC à la demande qui vous accompagnera en toute sécurité dans tous vos déplacements.</p>
                    <p>Via l’application FASTER vous pourrez commander votre chauffeur et vous déplacer 
                        vers la destination de votre choix en indiquant simplement la géolocalisation de votre destination finale</p>
                        <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-right: 10px;"><a href="{{ route('register') }}" style="text-decoration: none; color: white;">S'Inscrire</a></button>
                        <button style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; border-radius: 5px;"><a href="{{ route('login') }}" style="text-decoration: none; color: white;">Se Connecter</a></button>

                </div>
             </div>
		</section>
		
        
        <section id="chauffeur">
            <h2 style="text-align: center;"><u>DEVENIR CHAUFFEUR</u></h2>
            <div style="display:flex; flex-direction:row; justify-content:space-between; margin:40px;">
                <div style="flex-basis:50%; margin: 20px;">
                    <h1>Bienvenue sur le réseau Faster.</h1>
                    <p>Rejoignez-nous et augmentez vos revenus tout en gérant votre emploi du temps simplement.</p>
                    
                    <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-right: 10px;"><a href="{{ route('register') }}" style="text-decoration: none; color: white;">S'Inscrire</a></button>
                    <button style="background-color: #008CBA; color: white; padding: 10px 20px; border: none; border-radius: 5px;"><a href="{{ route('login') }}" style="text-decoration: none; color: white;">Se Connecter</a></button>
                </div>
                <div style="flex-basis:50%;">
                  <img src="images/taxi6.jpg" alt="">
                </div>
            </div>
        </section>
		
<footer id="contact" style="background-color: black; color: white; padding: 10px;">
            <p style="display: inline-block;">Nous-Contacter :</p>
            <ul style="display: inline-block; margin-left: 10px;">
                <li style="display: inline-block; margin-right: 10px;">Email : <a href="contact@faster-sn.com">contact@faster-sn.com</a></li>
                <li style="display: inline-block; margin-right: 10px;">Téléphone : +33 345 67 89</li>
                <li style="display: inline-block; margin-right: 10px;">Service recrutement : <a href="recrutement@faster-sn.com">recrutement@faster-sn.com</a></li>
                <li style="display: inline-block;">Service recrutement : <a href=" partenariat@faster-sn.com"> partenariat@faster-sn.com</a></li>
            </ul>

            


</footer>


		
    </main>

       
    
    </body>
</html>
