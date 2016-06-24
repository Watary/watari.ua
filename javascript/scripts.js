	function startTime(){
		var tm = new Date();
		var h = tm.getHours();
		var separator = "<img src='image/clock_separator.png' />";
		var s = checkTime(tm.getSeconds());
		var m = checkTime(tm.getMinutes());
		
		if (h < 10){
			var h = "<img src='image/clock_0.png' /><img src='image/clock_" + h + ".png' />";
		}else{
			if (h >= 20){
				var h1 = h - 20;
				var h2 = 2;
			}else{
				var h1 = h - 10;
				var h2 = 1;
			}
			var h = "<img src='image/clock_" + h2 + ".png' /><img src='image/clock_" + h1 + ".png' />";
		}
		
		document.getElementById('clock').innerHTML = h + separator + m + separator + s;
		t = setTimeout('startTime()',1000);
	}
	function checkTime(data){
		if (data < 10){
			return "<img src='image/clock_0.png' /><img src='image/clock_" + data + ".png' />";
		}else{
			for (var i = 10; i <= 70; i+=10){
				if (data <= i){
					var data1 = data - i + 10;
					var data2 = i / 10 - 1;
					if (data1 == 10){
						data1 = 0;
						data2 = i / 10;
					}
					break;
				}
			}
			return "<img src='image/clock_" + data2 + ".png' /><img src='image/clock_" + data1 + ".png' />";
		}
	}
	function tm_pa_f(){
		document.tm_pa.src='image/tm_pa_f.png';
    }
	function tm_pa_t(){
		document.tm_pa.src='image/tm_pa_t.png';
    }
	function tm_gb_f(){
		document.tm_gb.src='image/tm_gb_f.png';
    }
	function tm_gb_t(){
		document.tm_gb.src='image/tm_gb_t.png';
    }
	function tm_forum_f(){
		document.tm_forum.src='image/tm_forum_f.png';
    }
	function tm_forum_t(){
		document.tm_forum.src='image/tm_forum_t.png';
    }
	function tm_um_f(){
		document.tm_um.src='image/tm_um_f.png';
    }
	function tm_um_t(){
		document.tm_um.src='image/tm_um_t.png';
    }
	function tm_ent_f(){
		document.tm_ent.src='image/tm_ent_f.png';
    }
	function tm_ent_t(){
		document.tm_ent.src='image/tm_ent_t.png';
    }
	function tm_reg_f(){
		document.tm_reg.src='image/tm_reg_f.png';
    }
	function tm_reg_t(){
		document.tm_reg.src='image/tm_reg_t.png';
    }
	function setBold(){
		var el=document.getElementById("text");
		el.focus();
		if (el.selectionStart==null){
			document.selection.createRange().text = "[b][/b]";
		}else{
			el.value=el.value.substring(0,el.selectionStart)+"[b]"+el.value.substring(el.selectionStart,el.selectionEnd)+"[/b]"+el.value.substring(el.selectionEnd);
		}
	}
	function setItalic(){
		var el=document.getElementById("text");
		el.focus();
		if (el.selectionStart==null){
			document.selection.createRange().text = "[i][/i]";
		}else{
			el.value=el.value.substring(0,el.selectionStart)+"[i]"+el.value.substring(el.selectionStart,el.selectionEnd)+"[/i]"+el.value.substring(el.selectionEnd);
		}
	}
	function setUnderline(){
		var el=document.getElementById("text");
		el.focus();
		if (el.selectionStart==null){
			document.selection.createRange().text = "[u][/u]";
		}else{
			el.value=el.value.substring(0,el.selectionStart)+"[u]"+el.value.substring(el.selectionStart,el.selectionEnd)+"[/u]"+el.value.substring(el.selectionEnd);
		}
	}
	function UsersMausEnter(){
		document.UsersMausEnter.background-color='#564854';
    }
	function UsersMausNoEnter(){
		document.UsersMausEnter.background-color='#876543';
    }
