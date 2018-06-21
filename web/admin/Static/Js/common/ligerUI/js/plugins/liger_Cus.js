var tab = null;    //声明一个tab变量

$(function () {

	$("#frameCenter").ligerTab({
		showSwitchInTab : true,  //切换窗口按钮显示在最后一项
		showSwitch: true //显示切换窗口按钮
	});

	tab = liger.get("frameCenter");

});

//打开新页签
function f_addTab(tabid, text, url, callbackFunction){
	if(url.indexOf("?")>0){url += "&";}
	else{url += "?";}
	url += "pageTabId"+tabid + "&pageTabName"+text;
	tab.addTabItem({
		tabid: tabid,
		text: text,
		url: url,
		callback: function(){
			if(callbackFunction){
				callbackFunction();
			}
		}
	});
}











