<img src="{{ URL::asset('sample-banner.jpg') }}" alt="Boy on bike">

<h1>rpoudel91@gmail.com</h1>

<p id="sampleText">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

<p id="count"></p>
<button type="button" onclick="startCount()" id="javascript">JavaScript!</button>

<script>
    function startCount (){
    let futureTime = 10;

    if(document.getElementById("javascript").innerHTML == "JavaScript!"){

            var x = setInterval(function() {

            console.log(futureTime);
            document.getElementById("count").innerHTML = futureTime;
            futureTime = futureTime - 1;
                
            if (futureTime == -1) {
                clearInterval(x);
                //change every letter L and l to *
                var oldStr = document.getElementById("sampleText").innerHTML;
                console.log(oldStr);
                setCookie("oldStr",oldStr,1);
                var newStr = oldStr.replace(/[l|L]/g, '<span style="color:red;">*</span>');
                document.getElementById("sampleText").innerHTML = newStr;
                document.getElementById("javascript").innerHTML = "Reset";
            }
            }, 1000);

    }else{
        document.getElementById("sampleText").innerHTML = getCookie("oldStr");
        document.getElementById("javascript").innerHTML = "JavaScript!";
    }

    }

    function setCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }


    function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
                }
            }
            return "";
    }


        </script>

