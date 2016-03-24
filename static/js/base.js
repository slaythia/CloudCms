function isset(context){
	return typeof context !== 'undefined';
}



var _Log = (function(){
	var LogBin = function(){}
	LogBin.prototype.deBug = function(tag , value){
		if(typeof deBug !== 'undefined' && deBug){
			var date = new Date() , currentdate;
			currentdate = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
			console.debug( currentdate +" :: " +tag + "：" + value)
		}
	}
	return LogBin;
})();
var Log = new _Log();