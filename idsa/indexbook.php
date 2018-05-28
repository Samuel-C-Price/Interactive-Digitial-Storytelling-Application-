<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="ProjectImages/isdaLogo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Font Awsome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!--Google Font CSS-->
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <!--Index Page CSS Link-->
    <link rel="stylesheet" href="css/bookIndex.css">
    <title>IDSA</title>
  </head>
<body>
  <div class="container-fuild" id="cover">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
    <?php endif ?>
    <nav class="navbar navbar-expand-md fixed-top navbar-light font-weight-bold" style="background-color: rgba(255, 255, 153, 0.5)">
       <a class="navbar-brand" href="#"><img src="ProjectImages/isdaLogo.png" style="height: 40px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link"  href="#cover">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cover2">Create</a>
          </li>
          <li class="nav-item mx-1">
          <a class="nav-link" href="#cover3">Read</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#instructionModal">Instructions</a>
        </li>
      </ul>
      <ul class="navbar-nav navUserDetails ml-auto mr-5">
          <?php  if (isset($_SESSION['username'])) : ?>
          <p class="navUsername mr-5" disabled="">Welcome...<strong><?php echo $_SESSION['username']; ?></strong></p><br>
          <p class="navLogout"><a href="logout.php?logout=0">Logout</a></p>
          <?php endif ?>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row my-5">
        <div class="col BooksTitle justify-content-center mb-5">
          <h2 class="text-center">Interactive Digital Storytelling Application</h2>
        </div>
      </div>
    </div>
    </div>
    <!--Page Create-->
    <div id="cover2" class="container-fuild" >
       <div class="bookContainer">
        <div class="row">
          <div class="col text-center mt-5" id="Books">
            <h3 class="text-center mt-1">Create</h3>
          </div>
        </div>
        <div class="row my-5">
          <div class="col-md-2 col-sm-2 text-center my-auto">
            <button type="button" class="file-upload-btn btn btn-primary fas fa-arrow-left fa-2x" id="previous" disabled></button>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="page text-center" id="page_1" pageNumber="1">
              <div id="pageHeader">
                <div class="col-md-12 text-muted bookTitle"></div>
                <input type="text" id="titleHeader" placeholder="Please Write the title of your book here..." style="width:25%">
                <button type="btn" class=" btn-sm btn-default fas fa-check fa-2x" id="enterTitle" value="ENTER"></button>
              </div>
              <div class="row pageContent">
                <div class="col-md-6 CameraCapture">
                  <button type="button" class="file-upload-btn btn-md btn-sm btn-success fas fa-camera fa-2x" onclick="$('#file-upload-input1').trigger('click')"></button>
                  <div class="image-upload-wrap mx-auto" id="image-upload-wrap1">
                    <input class="file-upload-input" id="file-upload-input1" type='file' onchange="readURL(this);" accept="image/*" capture="enviroment" />
                    <div class="drag-text"><p><strong>Image will go here</strong></p></div>
                  </div>
                  <div class="file-upload-content" id="file-upload-content1">
                    <img class="file-upload-image" id="file-upload-image1" src="#" alt="your image" />
                    <div class="image-title-wrap" id="image-title-wrap1">
                      <!-- <button type="button" class="btn-md btn-sm btn-danger far fa-trash-alt fa-2x" onclick="removeUpload()" class="remove-image"></button> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder" id="chapterPage_1"></div>
                  <textarea type="text" id="chapterText_1" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter1" value="ENTER"></button>
                </div>
              </div>
              <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture="microphone" id="recorder"/></label>
                  <audio id="player" controls controlsList="nodownload"></audio>
                </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 1-->
            <!-- PAGE 2-->
            <div class="page text-center" id="page_2" pageNumber="2">
              <div id="pageHeader">
                <div class="col-md-12 text-muted bookTitle"></div>
              </div>
              <div class="row pageContent">
                <div class="col-md-6">
                  <button class="btn btn-danger far fa-edit fa-2x draw" data-toggle="modal" data-target="#sketchModal" style="position: absolute;"></button>
                  <img id="sketch-image" class="sketch-image mt-5" src="" alt=""/>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder mt-5" id="chapterPage_2"></div>
                  <textarea type="text" id="chapterText_2" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter2" value="ENTER"></button>
                </div>
                <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture id="recorder2"/></label>
                  <audio id="player2" controls controlsList="nodownload"></audio>
                </div>
              </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 2-->
            <!--PAGE 3-->
            <div class="page text-center" id="page_3" pageNumber="3">
              <div class="row pageContent">
                <div class="col-md-6 CameraCapture">
                   <button type="button" class="file-upload-btn btn-md btn-sm btn-success fas fa-camera fa-2x" onclick="$('#file-upload-input3').trigger('click')"></button>
                  <div class="image-upload-wrap mx-auto" id="image-upload-wrap3">
                    <input class="file-upload-input" id="file-upload-input3" type='file' onchange="readURL(this);" accept="image/*" capture="enviroment" />
                    <div class="drag-text"><p><strong>Image will go here</strong></p></div>
                  </div>
                  <div class="file-upload-content" id="file-upload-content3">
                    <img class="file-upload-image" id="file-upload-image3" src="#" alt="your image" />
                    <div class="image-title-wrap" id="image-title-wrap3">
                      <!-- <button type="button" class="btn-md btn-sm btn-danger far fa-trash-alt fa-2x" onclick="removeUpload()" class="remove-image"></button> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder mt-5" id="chapterPage_3"></div>
                  <textarea type="text" id="chapterText_3" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter3" value="ENTER"></button>
                </div>
                <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture id="recorder3"/></label>
                  <audio id="player3" controls controlsList="nodownload"></audio>
                </div>
              </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 3-->
            <!--PAGE 4-->
            <div class="page text-center" id="page_4"  pageNumber="4">
              <div class="row pageContent">
                <div class="col-md-6">
                   <button class="btn btn-danger far fa-edit fa-2x draw" data-toggle="modal" data-target="#sketchModal" style="position: absolute;"></button>
                  <img id="sketch-image" class="sketch-image mt-5" src="" alt=""/>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder mt-5" id="chapterPage_4"></div>
                  <textarea type="text" id="chapterText_4" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter4" value="ENTER"></button>
                </div>
                <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture id="recorder4"/></label>
                  <audio id="player4" controls controlsList="nodownload"></audio>
                </div>
              </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 4-->
            <!--PAGE 5-->
            <div class="page text-center" id="page_5"  pageNumber="5">
              <div class="row pageContent">
                <div class="col-md-6 CameraCapture">
                  <button type="button" class="file-upload-btn btn-md btn-sm btn-success fas fa-camera fa-2x" onclick="$('#file-upload-input5').trigger('click')"></button>
                  <div class="image-upload-wrap mx-auto" id="image-upload-wrap5">
                    <input class="file-upload-input" id="file-upload-input5" type='file' onchange="readURL(this);" accept="image/*" capture="enviroment" />
                    <div class="drag-text"><p><strong>Image will go here</strong></p></div>
                  </div>
                  <div class="file-upload-content" id="file-upload-content5">
                    <img class="file-upload-image" id="file-upload-image5" src="#" alt="your image" />
                    <div class="image-title-wrap" id="image-title-wrap5">
                      <!-- <button type="button" class="btn-md btn-sm btn-danger far fa-trash-alt fa-2x" onclick="removeUpload()" class="remove-image"></button> -->
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder mt-5" id="chapterPage_5"></div>
                  <textarea type="text" id="chapterText_5" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter5" value="ENTER"></button>
                </div>
                <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture id="recorder5"/></label>
                  <audio id="player5" controls controlsList="nodownload"></audio>
                </div>
              </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 5-->
            <!--PAGE 6-->
            <div class="page text-center" id="page_6"  pageNumber="6">
              <div class="row pageContent">
                <div class="col-md-6">
                  <button class="btn btn-danger far fa-edit fa-2x draw" data-toggle="modal" data-target="#sketchModal" style="position: absolute;"></button>
                  <img id="sketch-image" class="sketch-image mt-5" src="" alt=""/>
                </div>
                <div class="col-md-6">
                  <div class="chapterHolder mt-5" id="chapterPage_6"></div>
                  <textarea type="text" id="chapterText_6" class="chapterInput" placeholder="Please write your book here..."></textarea>
                  <button type="btn" class="btn-sm btn-default fas fa-check fa-2x" id="enterChapter6" value="ENTER"></button>
                </div>
                <div class="row" style="bottom: 0;position: absolute;">
                <div class="col-md-12 ml-2 mb-2">
                  <label class="btn btn-default fas fa-microphone fa-2x audioRecord"><input  type="file" accept="audio/*" capture id="recorder6"/></label>
                  <audio id="player6" controls controlsList="nodownload"></audio>
                </div>
              </div>
              </div><!--END OF PAGE CONTENT -->
            </div><!--END OF PAGE 6-->

          </div><!--END OF BOOK CONTAINER-->
          <div class="col-md-2 col-sm-2 text-center my-auto">
            <!--Buttons which link to nonworking jquery-->
            <button type="button" class="btn btn-primary fas fa-arrow-right fa-2x" id="next"></button>
          </div>
          <button type="button" id="btnSave" class="btn ml-5 mt-2  text-light far fa-save fa-2x " style="background-color: #6200EA"></button>
          <button type="button" id="btnLoad" class="btn  ml-5 mt-2 text-light fas fa-upload fa-2x" style="background-color: #6200EA"></button>
        </div> 
      </div><!--close of bookContainer-->
    </div>

    <div id="cover3" class="container-fuild" >
      <!-- Reading Books Section -->
        <div class="row">
          <div class="col text-center mt-5" id="Books">
            <h3 class="text-center mt-3">Read</h3>
          </div>
        </div>
         <div class="container readingBooks">
        <div class="row">
          <div class="col-md-4">
            <h2>Book One.</h2><hr>
            <p>Description : <br>  Book One has been provided to improve your reading skills, please click on the button below to view this book.<br><a class="btn btn-secondary" href="bookOne.html" role="button">View Book &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Book Two.</h2><hr>
            <p>Description : <br>  Book Two has been provided to improve your reading skills, please click on the button below to view this book.<br><a class="btn btn-secondary" href="#" role="button">View Book &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Book Three.</h2><hr>
            <p>Description : <br>  Book Three has been provided to improve your reading skills, please click on the button below to view this book.<br><a class="btn btn-secondary" href="#" role="button">View Book &raquo;</a></p>
          </div>
        </div>
      </div><!--End of Reading Books Section -->
    </div><!--End of Cover 3-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////                          END OF WEBSITE DISPLAY CONTENT, MODALS AND JS BELOW               ////////////////-->
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--//// Instructions Modal ////-->
    <div class="modal fade" id="instructionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="instructionmodal modal-dialog modal-lg" role="document" height="500" style="min-width: 80%;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Instructions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <embed src="Interactive Digital Storytelling Application Help Guide.pdf" width="100%" height="500"></embed>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--//// End of Instruction Modal ////-->
    <!-- JV Comment: Added this so it's always easy to get the currentPage from any function -->
    <div class="currentPage" style="display:none;">1</div>
    <!--//// sketch Modal ////-->
              <div class="modal fade" id="sketchModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel">Draw</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <canvas id="sketch-canvas" width="470" height="500">Sorry your browser does not allow the sketch pad, please use an alternative.</canvas>
                      <div class="controls">
                        <ul><li class="black selected"></li><li class="brown"></li><li class="white"></li><li class="dblue"></li><li class="lblue"></li><li class="purple"></li><li class="pink"></li><li class="red"></li><li class="orange"></li><li class="yellow"></li><li class="dgreen"></li><li class="lgreen"></li></ul>
                      </div>
                      <div class="col-md-12">
                        <div class="sizecontrols controls" id="markerSize">
                          <button id="smallBtn" class="btn-sm btn-default selected ">Small</button>
                          <button id="mediumBtn" class="btn-sm btn-default ">Medium</button>
                          <button id="largeBtn" class="btn-sm btn-default ">Large</button>
                          <button id="xlargeBtn" class="btn-sm btn-default ">X Large</button>
                          <button id="fillBtn" class="btn-sm btn-default ">Fill</button>
                          <button id="clearBtn" class="btn-sm btn-default " >Clear</button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" id="saveBtn" data-dismiss="modal">Save Drawing</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--//// End of Sketch Modal ////-->
    <!--////////////////////-->
    <!--Javascript and jQuery Code for animated effects-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Sketch Pad Javascript-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <!-- <script type="text/javascript" src="JS/sketchPad.js" ></script> -->
    <!--External Javascript file for camera, user can take or upload photos to add to the page.-->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="JS/cameraCapture.js"></script> -->
    <script type="text/javascript" src="JS/new-js.js"></script>
    <!---->
    <script type="text/javascript">
      var recorder = document.getElementById('recorder');
      var player = document.getElementById('player');

      recorder.addEventListener('change', function(e) {
      var file = e.target.files[0];
      // Do something with the audio file.
      player.src =  URL.createObjectURL(file);
    });

      var recorder2 = document.getElementById('recorder2');
      var player2 = document.getElementById('player2');

      recorder2.addEventListener('change', function(e) {
      var file2 = e.target.files[0];
      // Do something with the audio file.
      player2.src =  URL.createObjectURL(file2);
    });
      var recorder3 = document.getElementById('recorder3');
      var player3 = document.getElementById('player3');

      recorder3.addEventListener('change', function(e) {
      var file3 = e.target.files[0];
      // Do something with the audio file.
      player3.src =  URL.createObjectURL(file3);
    });
      var recorder4 = document.getElementById('recorder4');
      var player4 = document.getElementById('player4');

      recorder4.addEventListener('change', function(e) {
      var file4 = e.target.files[0];
      // Do something with the audio file.
      player4.src =  URL.createObjectURL(file4);
    });
      var recorder5 = document.getElementById('recorder5');
      var player5 = document.getElementById('player5');

      recorder.addEventListener('change', function(e) {
      var file5 = e.target.files[0];
      // Do something with the audio file.
      player5.src =  URL.createObjectURL(file5);
    });
      var recorder6 = document.getElementById('recorder6');
      var player6 = document.getElementById('player6');

      recorder6.addEventListener('change', function(e) {
      var file6 = e.target.files[0];
      // Do something with the audio file.
      player6.src =  URL.createObjectURL(file6);
    });
    </script>
    <!-- <script type="text/javascript">
    //When clicking on control list items
    $(".navbar").on("click", "li", function(){
      //Deselect sibling elements
      $(this).siblings().removeClass("active");
      //Select clicked element
      $(this).addClass("active");
      });
    $(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) { //on click of 'a' smooth scroll to section selected in href of a tag. 
    // ensures that 'hash' has a vlaue befire giving it a behaviour from the default
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();
      // Store hash
      var hash = this.hash;
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
        }, 1000, function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
        });
    } // End if
    });
    //// BOOK PAGE TRANSITION //// 
    //Book page movement, press next or previous to open different pages in the book. 
    var currentPage = 1;
    var numberOfPages = 6;

    function nextPage(currentPage,numberOfPages) {
      $('button#previous').removeAttr("disabled");
      if (currentPage < numberOfPages) {
        var nextPage = currentPage + 1;
        $("#page_"+currentPage).fadeOut(100);
        $("#page_"+nextPage).delay(100).fadeIn(100);
        currentPage = nextPage;
      }
      if (currentPage  == numberOfPages) {
        $('button#next').attr("disabled","disabled");
      }
      return currentPage
    }
    function previousPage(currentPage,numberOfPages) {
      $('button#next').removeAttr("disabled");
      if (currentPage > 1) {
        var nextPage = currentPage - 1;
        $("#page_"+currentPage).fadeOut(100);
        $("#page_"+nextPage).delay(100).fadeIn(100);
        currentPage = nextPage;
      }
      if (currentPage == 1) {
        $('button#previous').attr("disabled","disabled");
      }
      return currentPage
    }
    $("button#next").click(function(){
      currentPage = nextPage(currentPage,numberOfPages);
    });
    $("button#previous").click(function(){
      currentPage = previousPage(currentPage,numberOfPages);
    });
    //// BOOK CONTENT ANIMATION ////
    //User inputs text to then be entered into the header, and the section of the page, once clicked the input section will be removed. 
    var titlebtn = document.getElementById('enterTitle');
    titlebtn.onclick = function(){
      document.querySelector('.bookTitle').innerHTML = document.querySelector('#titleHeader').value; 
      document.getElementById('titleHeader').remove(); // onclick removes the input form
      this.remove(); // onclick removes the button 'ENTER'
    };
    var chapbtn1 = document.getElementById('enterChapter1');
    chapbtn1.onclick = function(){
      document.querySelector('#chapterPage_1').innerHTML = document.querySelector('#chapterText_1').value;
      document.getElementById('chapterText_1').remove();
      this.remove();
    };
    var chapbtn2 = document.getElementById('enterChapter2');
    chapbtn2.onclick = function(){
      document.querySelector('#chapterPage_2').innerHTML = document.querySelector('#chapterText_2').value;
      document.getElementById('chapterText_2').remove();
      this.remove();
    };
    var chapbtn3 = document.getElementById('enterChapter3');
    chapbtn3.onclick = function(){
      document.querySelector('#chapterPage_3').innerHTML = document.querySelector('#chapterText_3').value;
      document.getElementById('chapterText_3').remove();
      this.remove();
    };
    var chapbtn4 = document.getElementById('enterChapter4');
    chapbtn4.onclick = function(){
      document.querySelector('#chapterPage_4').innerHTML = document.querySelector('#chapterText_4').value;
      document.getElementById('chapterText_4').remove();
      this.remove();
    };
    var chapbtn5 = document.getElementById('enterChapter5');
    chapbtn5.onclick = function(){
      document.querySelector('#chapterPage_5').innerHTML = document.querySelector('#chapterText_5').value;
      document.getElementById('chapterText_5').remove();
      this.remove();
    };
    var chapbtn6 = document.getElementById('enterChapter6');
    chapbtn6.onclick = function(){
      document.querySelector('#chapterPage_6').innerHTML = document.querySelector('#chapterText_6').value;
      document.getElementById('chapterText_6').remove();
      this.remove();
    };
    });// END OF JAVASCRIPT & JQUERY // 
    </script> -->
</body>
</html>
