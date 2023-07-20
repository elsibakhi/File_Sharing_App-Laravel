var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 9000000){
       alert("File is too big!");
       this.value = "";
    };


};




