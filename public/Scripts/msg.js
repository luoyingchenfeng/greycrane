var msgCounter={baseurl:"http://counter.fengniao.com/msg.gif?",insertImg:function(a,b){var now=new Date().getTime(),src=this.baseurl+"t="+now+"&"+b,imgObj=document.getElementById("FNOLImg");if(undefined==imgObj){imgObj=document.createElement("img");imgObj.setAttribute('id',a);imgObj.setAttribute('style','display:none;')}imgObj.src=src;document.body.appendChild(imgObj)},readck:function(a){var c="";var b=a+"=";if(document.cookie.length>0){offset=document.cookie.indexOf(b);if(offset!=-1){offset+=b.length;end=document.cookie.indexOf(";",offset);if(end==-1){end=document.cookie.length}c=unescape(document.cookie.substring(offset,end))}}return c},aLive:function(){var userid=msgCounter.readck("bbuserid");if(userid!=undefined&&userid!=""){var param="at=aLive&uid="+userid,domName="FNOLImg";msgCounter.insertImg(domName,param)}}};msgCounter.aLive();window.setInterval(msgCounter.aLive,30000);