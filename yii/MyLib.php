<?php 

function localstore($key,$value){
    echo "<script>
    m_l_sg('$key','$value');
	
    </script>";
}
function localremove($key){
    echo "<script>
    m_l_rg('$key');
    </script>";
}
?>
<script>
    function m_l_sg(key, value) {
        if (window.localStorage) {
            var item = localStorage.getItem(key);

            if (item) {
                localStorage.removeItem(key);
            } else {
                localStorage.setItem(key, value);
            }
        }
        console.log(key+value);
    }
    function m_l_rg(key) {
        if (window.localStorage) {
            return localStorage.getItem(key);
        }
    }
</script>