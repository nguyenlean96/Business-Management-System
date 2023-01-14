    </div>
    <nav>
      <a onclick="topFunction()" id="topbtn" href="#">Back to top</a>
    </nav>
    <section id="footer">
      <?= _disp("h6", ["color" => "yellow", "background-color" => "#333", "padding" => "1em", "margin" => "0"], "2021 @ ".$webpage->getAuthors()) ?>
    </section>
    <script src="https://my.gblearn.com/js/loadscript.js"></script>
    <script>
      let mybutton = document.getElementById("topbtn");
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }
              
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
      let dt = new Date();
      document.getElementById("datetime").innerHTML = (("0"+(dt.getMonth()+1)).slice(-2) +"/"+
          (("0"+dt.getDate()).slice(-2)) +"/"+ (dt.getFullYear()));

      function initMap() {
        const uluru = { lat: -25.344, lng: 131.036 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
  </body>
</html>
