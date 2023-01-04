<html>
<head>
<title>Movie Database</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel, #flip {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#panel {
  padding: 50px;
  display: none;
  text-align:left;
}

button {
  position: center;
}

</style>
</head>
<body>
<?php include 'inc-dbconn.php' ?>
<h1>Movies</h1>
<a href="http://localhost/team02/login.php">
  <button onclick="document.getElementById('id01').style.display='block'">Login</button>
</a>

<?php 
  echo "<br>";
?>

<a href="http://localhost/team02/genre.php">
  <button onclick="document.getElementById('id01').style.display='block'">Genre</button>
</a>
<a href="http://localhost/team02/actor.php">
  <button onclick="document.getElementById('id01').style.display='block'">Actor</button>
</a>
<a href="http://localhost/team02/director.php">
  <button onclick="document.getElementById('id01').style.display='block'">Director</button>
</a>
<a href="http://localhost/team02/awards.php">
  <button onclick="document.getElementById('id01').style.display='block'">Awards</button>
</a>
<a href="http://localhost/team02/rating.php">
  <button onclick="document.getElementById('id01').style.display='block'">Rating</button>
</a>

<?php 
  echo "<br>";
?>

<a href="http://localhost/team02/queries.php">
  <button onclick="document.getElementById('id01').style.display='block'">Queries</button>
</a>

<?php $query = "select * from movies_by_ID" ?>
<?php include 'inc-show-table.php' ?>

</body>
</html>