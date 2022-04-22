let now_playing = document.querySelector(".playing_part");
let track_art = document.querySelector(".img");
let track_name = document.querySelector(".song_title");
let track_artist = document.querySelector(".artist_name");
  
let playpause_btn = document.querySelector(".test");
let next_btn = document.querySelector(".bx bx-skip-next");
let prev_btn = document.querySelector(".bx bx-skip-next");
  
let seek_slider = document.querySelector(".seek_slider");
let volume_slider = document.querySelector(".volume_slider");
let curr_time = document.querySelector(".current_time");
let total_duration = document.querySelector(".duration");

let track_index = 0;
let isPlaying = false;
let updateTimer;

let loopSong = false;


let curr_track = document.createElement('audio');
let next_track = document.createElement('audio');

  function loadTrack(track_index) {
    // Clear the previous seek timer
    clearInterval(updateTimer);
    resetValues();
    
    // Load a new track
    curr_track.src = paths[track_index];
    curr_track.load();
    next_track.src = paths[(track_index+1) % namee.length];
    next_track.load();

    // Update details of the track
    track_art.style.backgroundImage = 
       "url(" + image[track_index] + ")";
    track_name.textContent = namee[track_index];
    track_artist.textContent = artist[track_index];
    

    // Set an interval of 1000 milliseconds
    // for updating the seek slider
    updateTimer = setInterval(seekUpdate, 1000);
    
    // Move to the next track if the current finishes playing
    // using the 'ended' event
    curr_track.addEventListener("ended", nextTrack);
    
  }
    

  function resetValues() {
    curr_time.textContent = "00:00";
    total_duration.textContent = "00:00";
    seek_slider.value = 0;
  }

  function playpauseTrack() {
    // Switch between playing and pausing
    // depending on the current state
    if (!isPlaying) playTrack();
    else pauseTrack();
  }

  function playTrack() {
    // Play the loaded track
    curr_track.play();
    isPlaying = true;
    
    // Replace icon with the pause icon
    //console.log(playpause_btn);
    playpause_btn.innerHTML = '<i class="bx bx-pause"></i>';
  }

  function pauseTrack() {
    // Pause the loaded track
    curr_track.pause();
    isPlaying = false;
    
    // Replace icon with the play icon
    playpause_btn.innerHTML = '<i class="bx bx-play"></i>';
  }

  function nextTrack() {
    if(loopSong){
      loadTrack(track_index);
      playTrack();  
    }
    else{
      // Go back to the first track if the
      // current one is the last in the track list
      if (track_index < namee.length - 1)
        track_index += 1;
      else track_index = 0;
    
      // Load and play the new track
      let temp_track = curr_track;
      curr_track = next_track;
      next_track = temp_track;

      loadTrack(track_index);
      playTrack();
    }
  }

  function toggleLoopSong(){
    loopSong = !(loopSong);
    console.log(loopSong);
  }

  function seekTo() {
    // Calculate the seek position

    seekto = curr_track.duration * (seek_slider.value / 100);
    console.log(slider.value);
    // Set the current track position to the calculated seek position
    curr_track.currentTime = seekto;
  }

  function setVolume() {
    // Set the volume according to the
    // percentage of the volume slider set
    curr_track.volume = volume_slider.value / 100;
  }

  function seekUpdate() {
    let seekPosition = 0;
    
    // Check if the current track duration is a legible number
    if (!isNaN(curr_track.duration)) {
      seekPosition = curr_track.currentTime * (100 / curr_track.duration);
      seek_slider.value = seekPosition;
    
      // Calculate the time left and the total duration
      let currentMinutes = Math.floor(curr_track.currentTime / 60);
      let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
      let durationMinutes = Math.floor(curr_track.duration / 60);
      let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);
    
      // Add a zero to the single digit time values
      if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
      if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
      if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
      if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }
    
      // Display the updated duration
      curr_time.textContent = currentMinutes + ":" + currentSeconds;
      total_duration.textContent = durationMinutes + ":" + durationSeconds;
    }
  }

  loadTrack(track_index);