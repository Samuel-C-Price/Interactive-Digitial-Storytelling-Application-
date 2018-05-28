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
    $('div.currentPage').text(currentPage); //Added in so can access currentPage from functions
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
    $('div.currentPage').text(currentPage); //Added in so can access currentPage from functions
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

  $('button.draw').on("click",function(){
    drawSetup(currentPage);
  });

});

// SKETCH PAD JS //

//Function called manually, means it redoes everything each time. Means can pass in currentPage as param
function drawSetup(currentPage){
  console.log("Setting up drawing for page "+currentPage);
  // Get a regular interval for drawing to the screen
  window.requestAnimFrame = (function (callback) {
    return window.requestAnimationFrame || 
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimaitonFrame ||
          function (callback) {
            window.setTimeout(callback, 1000/60);
          };
  })();

  // Set up the canvas
  var canvas = document.getElementById("sketch-canvas");
  var ctx = canvas.getContext("2d");
  //This will clear the canvas each time drawSetup is called
  clearCanvas();
  var color = $(".selected").css("background-color");

  // Set up the UI
  var sketchImage = document.getElementById("sketch-image-"+currentPage);
  
  
  var save = document.getElementById("saveBtn");
  save.removeEventListener("click", saveDrawing); 
  //Event listeners are persistant, so we need to remove all existing save event listeners before creating new ones with the correct current page. Not having this means you update every page you've drawn on
  
  //Size buttons 
  var small = document.getElementById("smallBtn");
  var medium = document.getElementById("mediumBtn");
  var large = document.getElementById("largeBtn");
  var xlarge = document.getElementById("xlargeBtn");
  var fill = document.getElementById("fillBtn");
  var clear = document.getElementById("clearBtn");

  clear.addEventListener("click", function (e) {
    $(this).siblings().removeClass("selected");
      //Select clicked element
      $(this).addClass("selected");
    clearCanvas();
    sketchImage.setAttribute("src", "");
  }, false);

  save.addEventListener("click", saveDrawing); 


  // Setting the size of the strokes on the canvas. 
  small.addEventListener("click", function(e){
    $(this).siblings().removeClass("selected");
    //Select clicked element
    $(this).addClass("selected");
    ctx.lineWidth = 2;
  }, false);
  medium.addEventListener("click", function(e){
    $(this).siblings().removeClass("selected");
      //Select clicked element
      $(this).addClass("selected");
    ctx.lineWidth = 10;
  }, false);
  large.addEventListener("click", function(e){
    $(this).siblings().removeClass("selected");
      //Select clicked element
      $(this).addClass("selected");
    ctx.lineWidth = 20;
  }, false);
  xlarge.addEventListener("click", function(e){
    $(this).siblings().removeClass("selected");
      //Select clicked element
      $(this).addClass("selected");
    ctx.lineWidth = 40;
  }, false);
  fill.addEventListener("click", function(e){
    $(this).siblings().removeClass("selected");
      //Select clicked element
      $(this).addClass("selected");
    ctx.lineWidth = 2000;
  }, false);

  // Set up mouse events for drawing
  var drawing = false;
  var mousePos = { x:0, y:0 };
  var lastPos = mousePos;
  canvas.addEventListener("mousedown", function (e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);
  canvas.addEventListener("mouseup", function (e) {
    drawing = false;
  }, false);
  canvas.addEventListener("mousemove", function (e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Set up touch events for mobile, etc
  canvas.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
  }, false);
  canvas.addEventListener("touchend", function (e) {
    var mouseEvent = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(mouseEvent);
  }, false);
  canvas.addEventListener("touchmove", function (e) {
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
  }, false);

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function (e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  // Get the position of the mouse relative to the canvas
  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    };
  }
  // Get the position of a touch relative to the canvas
  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    };
  }
  //When clicking on control list items
  $(".controls").on("click", "li", function(){
    //Deselect sibling elements
    $(this).siblings().removeClass("selected");
    //Select clicked element
    $(this).addClass("selected");
    //cache current color
    color = $(this).css("background-color");
    });
  // Draw to the canvas
  function renderCanvas() {
    if (drawing) {
      ctx.beginPath();
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.lineJoin = 'round';
      ctx.lineCap = 'round';
      ctx.stroke();
      ctx.strokeStyle = color;
      lastPos = mousePos;
    }
  }
  function clearCanvas() {
    canvas.width = canvas.width;
  }
  // Allow for animation
  (function drawLoop () {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

}

// CODE FOR CAMERA FUNCTIONALITY 
function readURL(input){
  var currentPage = $('div.currentPage').text();
  if (input.files && input.files[0]) {
    console.log("Adding image to page ",currentPage);
    var reader = new FileReader();
    reader.onload = function(e) {
      $('div#page_'+currentPage+' .image-upload-wrap').hide();
      $('div#page_'+currentPage+' img.file-upload-image').attr('src', e.target.result);
      $('div#page_'+currentPage+' div.file-upload-content').show();
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUpload();
  }
}
function removeUpload() {
  $('div#page_'+currentPage+' .file-upload-input').replaceWith($('#file-upload-input1').clone());
  $('div#page_'+currentPage+' div.file-upload-content').hide();
  $('div#page_'+currentPage+' .image-upload-wrap').show();
}
//new save function - to remove an event listener, it has to be an external function not function(e){}
function saveDrawing(e){
  var canvas = document.getElementById("sketch-canvas");
  var dataUrl = canvas.toDataURL();
  var currentPage = $('div.currentPage').text();
  console.log("Saving data to page "+currentPage)
  $("div#page_"+currentPage+" img#sketch-image").attr("src",dataUrl); //Use like this so no need to name every element individually
}