<?php
include 'pages/header.php';

?>
<article>
    <div class="col-md-3" style="border-right: 2px solid #098137;">
        <ul class="nav nav-pills nav-stacked" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Mon profile</a></li>
            <li class="nav-item"><a  class="nav-link" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Mes commentaires</a></li>
            <li class="nav-item"><a  class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Mon Adhesion</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Soumetre un événement </a></li>
        </ul>
    </div>
    
    <div class="col-md-9 tab-content" id="myTabContent">
        <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <H2>voila</H2>
            <p>...</p>
        </div>
        <div class="tab-pane fade in" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <H2>faut vraiment un titre?</H2>
        <p>...</p>
        </div>
        <div class="tab-pane fade in" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <p>...</p>
        </div>
    </div>
</article>
<?php
// include 'pages/footer.php';

?>