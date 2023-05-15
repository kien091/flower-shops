function openTab(evt, tabName) {
  // Lấy tất cả các tabcontent và ẩn đi
  var tabcontent = document.getElementsByClassName("tabcontent");
  for (var i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Lấy tất cả các tablinks và xóa active class
  var tablinks = document.getElementsByClassName("tablinks");
  for (var i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Hiển thị nội dung của tab được chọn và thêm active class cho button
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

