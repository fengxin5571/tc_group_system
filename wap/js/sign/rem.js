function a(b) {
    var d = document.documentElement.clientWidth;
    var a = d / b;
    var c = a * 100;
    document.getElementsByTagName("html")[0].style.fontSize = c + "px"
}
a(640);