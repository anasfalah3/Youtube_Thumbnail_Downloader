const urlField = document.querySelector(".field input");
previewArea = document.querySelector(".preview-area");
imgTag = document.querySelector(".thumbnail");
hiddenInput = document.querySelector(".hidden-input");

urlField.onkeyup = () => {
  let imgUrl = urlField.value; //getting user entered value
  previewArea.classList.add("active");

  if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
    // if entered value is yet video url
    let vidId = imgUrl.split("v=")[1].substring(0, 11); //splitting yt video url from v= so we can get only video
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbUrl;
  } else if (imgUrl.indexOf("https://youtu.be/") != -1) {
    // if video url is look like this
    let vidId = imgUrl.split("be/")[1].substring(0, 11); //splitting yt video url from be/ so we can get only video
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytThumbUrl;
  } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
    // if entered value is other image file url
    imgTag.src = imgUrl;
  }else{
    imgTag.src = "";
    previewArea.classList.remove("active")
  }
  hiddenInput.value = imgTag.src
};
