dynamic class mx.effects.Tween extends Object
{
	static var IntervalToken;
	var arrayMode, listener, initVal, endVal, startTime, updateFunc, endFunc, ID;
	function Tween(listenerObj, init, end, dur) {
		super();
		if (listenerObj == undefined){
			return;
		}
		if (typeof(init) != "number"){
			this.arrayMode = true;
		}
		this.listener = listenerObj;
		this.initVal = init;
		this.endVal = end;
		if (dur != undefined){
			this.duration = dur;
		}
		this.startTime = getTimer();
		if (this.duration == 0){
			this.doInterval();
		} else {
			Tween.AddTween(this);
		}
	}
	static function AddTween(tween) {
		tween.ID = ActiveTweens.length;
		ActiveTweens.push(tween);
		if (IntervalToken == undefined){
			Dispatcher.DispatchTweens = Tween.DispatchTweens;
			IntervalToken = setInterval(Dispatcher, "DispatchTweens", Interval);
		}
	}
	static function RemoveTweenAt(index) {
		var Register_2_ = ActiveTweens;
		if ((index >= Register_2_.length || index < 0) || (index == undefined)){
			return undefined;
		}
		Register_2_.splice(index, 1);
		var Register_4_ = Register_2_.length;
		var Register_1_ = index;
		while (Register_1_ < Register_4_){
			Register_2_[Register_1_].ID--;
			Register_1_++;
		}
		if (Register_4_ == 0){
			clearInterval(IntervalToken);
			delete IntervalToken;
		}
	}
	static function DispatchTweens(Void) {
		var Register_2_ = ActiveTweens;
		var Register_3_ = Register_2_.length;
		var Register_1_ = 0;
		while (Register_1_ < Register_3_){
			Register_2_[Register_1_].doInterval();
			Register_1_++;
		}
		updateAfterEvent();
	}
	function doInterval() {
		var Register_2_ = (getTimer() - this.startTime);
		var Register_3_ = this.getCurVal(Register_2_);
		if (Register_2_ >= this.duration){
			this.endTween();
		} else if (this.updateFunc != undefined){
			this.listener[this.updateFunc](Register_3_);
		} else {
			this.listener.onTweenUpdate(Register_3_);
		}
	}
	function getCurVal(curTime) {
		if (this.arrayMode){
			var Register_3_ = new Array();
			var Register_2_ = 0;
			while (Register_2_ < this.initVal.length){
				Register_3_[Register_2_] = this.easingEquation(curTime, this.initVal[Register_2_], (this.endVal[Register_2_] - this.initVal[Register_2_]), this.duration);
				Register_2_++;
			}
			return Register_3_;
		} else {
			return this.easingEquation(curTime, this.initVal, (this.endVal - this.initVal), this.duration);
		}
	}
	function endTween() {
		if (this.endFunc != undefined){
			this.listener[this.endFunc](this.endVal);
		} else {
			this.listener.onTweenEnd(this.endVal);
		}
		Tween.RemoveTweenAt(this.ID);
	}
	function setTweenHandlers(update, end) {
		this.updateFunc = update;
		this.endFunc = end;
	}
	function easingEquation(t, b, c, d) {
		return (c / 2 * (Math.sin(Math.PI * (t / d - 0.5)) + 1) + b);
	}
	static var ActiveTweens = new Array();
	static var Interval = 10;
	static var Dispatcher = new Object();
	var duration = 3000;
}
