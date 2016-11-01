function hide_ads_right(){
				//ẩn div tắt quảng cáo
				document.getElementById("exit-ads").style.display="none";
				//ẩn div có chứa image
				document.getElementById("content-ads").style.display="none";
				//hiện div xem quảng cáo
				document.getElementById("look-ads").style.display="block";
				
			}
function block_ads_right(){
	//hiện div tắt quảng cáo
	document.getElementById("exit-ads").style.display="block";
	//hiện div có chứa image
	document.getElementById("content-ads").style.display="block";
	//ẩn div xem quảng cáo
	document.getElementById("look-ads").style.display="none";
	
	}