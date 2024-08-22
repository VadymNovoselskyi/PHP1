<!DOCTYPE html>   
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Responsiv webbdesign</title>
      <link rel="stylesheet" href="css/styleSheet.css?v=1.0">
      <link rel="stylesheet" href="css/gridCSS.css">
   </head>
   <body>
      <?php include("inc/header.html");?>
      <main>
         <section class="col-6 col-t-3 col-d-4  col-w-4 red">
            <h2>Lär dig webbutveckling på ett enkelt sätt</h2>
            <p>Denna webbplats är tänkt som en resurs till kursen Webbutveckling 1.
               Tanken är att alla bidrar med sina kunskaper och erfarenheter.
            </p>
         </section>

         <section class="col-6 col-t-4 row-t-2 col-d-2 row-d-2  col-w-2 row-w-3 silver">
            <h2>Responsiv Webbdesign</h2>
            <p>Denna webbplats är tänkt som en resurs till kursen Webbutveckling 1.</p>
            <p>Tanken är att alla bidrar med sina kunskaper och erfarenheter.</p>
            <img src="img/htmlcss.png" alt="Logga" class="right">
         </section>

         <section class="col-6 col-t-3 col-d-4  col-w-2 blue">
            <h2>HTML</h2>
            <p>Lär dig grundernai html på endast 55 minuter!</p>
         </section>

         <section class="col-6 col-t-2 col-d-2  col-w-2 yellow">
            <h2>CSS</h2>
            <p>CSS på 2 x 60 minuter!</p>
            <p>Vi går igenom de vanligaste css-reglerna för att sedan fördjupa oss i animation med css.</p>
         </section>

         <section class="col-6 col-t-2 col-d-2  col-w-4 green">
            <h2>Mobile First</h2>
            <p>Gör din webbplats tillgänglig för alla med fokus på mobilaenheter.</p>
         </section>

         <section class="col-6 col-t-6 col-d-2  col-w-6 orange">
            <h2>Desktop First</h2>
            <p>Gör din webbplats tillgänglig för alla med fokus på stora högupplösta skärmar.</p>
         </section>
      </main>

      <?php include("inc/footer.html");?>
   </body>
</html>
