<div class="room_list">
  <?php
  if($value['origin'] == 'search'){
      echo '<div class="subtitle"> Result of the search "'.$value['search-term'].'": </div> </br>';
  }
  if($value['origin'] == 'list'){
      echo '<div class="subtitle"> List of the rooms : </div> </br>';
  }
  if($value['origin'] == 'equipment'){
      echo '<div class="subtitle"> List of the rooms for the searched equipment : </div> </br>';

  }

  if(empty($value['room_list'])){
      echo '<div class="subtitle"> No room found </div>';
  } else{
      partial('room-list', $value);
  }
  ?>

<!--    BACK BUTTON -->
    </br></br>
    <form class="room-display" name="room-display" action="staff-home.php">
        <input class="view-button" type="submit" name="submit" value="Back"/>
    </form>

</div>
