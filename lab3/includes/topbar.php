<!--
Angelica Engström, anen1805, Laboration 3, 2022-02-21
Erhåller navigationsknappar för hemsidan
-->
<div id="head">
    <button id="Start" onclick="window.location.href='index.php'">Start</button>
    <button id="QA" onclick="window.location.href='page2.php'">Q/A</button>
    <button id="Info" onclick="window.location.href='page3.php'">Info</button>
    <button id="exitbtn" onclick="window.location.href='includes/exit.php'">Logga ut</button>

    <div id="google_translate_element"></div> <!--Skapar ett översättnings element på hemsidan: 
                                                https://www.w3schools.com/howto/howto_google_translate.asp
                                                -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'sv', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
<div id="frm">