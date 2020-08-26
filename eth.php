<?php include_once('./includes/header.php') ?>

<div style="padding-top: 10px; text-align: center; max-width: 800px; margin: 0 auto; background-color: #F3FFF0">
  <div style="color: #009688; font-weight: bold; padding-bottom: 5px;" id="getBlock"> Get Ethereum block number</div>
  <div id="getBlockcontent">
  <div id="block"> Ethereum Block nr. </div>
  <div style="color: #009688; padding-top: 10px;"> Source Code</div>
    <script src="https://gist.github.com/IT-Sammlung/0993cbf301cf226f2340f1de12d6c01b.js"></script>
  </div>
</div>


<!-- Binde Web3 JS ein -->
<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    if (typeof web3 !== 'undefined') {
      web3 = new Web3(web3.currentProvider);
        //Führe Funktion aus wenn MetaMask erkannt wurde
        //Erzeuge loop mit 1 Sekunde
      setInterval(function() {
        //Rufe Ethereum Blocknummer Funktion auf und speichere Ausgabe in
        //Variabel data welche an .innerHTML weitergegeben wird
        web3.eth.getBlockNumber().then(data => {
          document.getElementById("block").innerHTML = "Ethereum Block Nr. " + data;
        });
      }, 1000);
        //Führe Funktion aus wenn MetaMask nicht erkannt wurde
    } else {
      // Verbinde mit öffentliches Node um Daten abzugreifen
      web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/214abf1982864b24907423eb3f7987d9"));
      setInterval(function() {
        web3.eth.getBlockNumber().then(data => {
          document.getElementById("block").innerHTML = "Ethereum Block Nr. " + data;
        });
      }, 1000);
    }
    </script>


<?php include_once('./includes/footer.php') ?>
