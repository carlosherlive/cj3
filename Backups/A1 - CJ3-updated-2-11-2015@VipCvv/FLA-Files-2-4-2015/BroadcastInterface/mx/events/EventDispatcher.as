dynamic class mx.events.EventDispatcher
{
	function EventDispatcher() {
	}
	static function _removeEventListener(queue, event, handler) {
		if (queue != undefined){
			var Register_4_ = queue.length;
			var Register_1_ = undefined;
			Register_1_ = 0;
			while (Register_1_ < Register_4_){
				var Register_2_ = queue[Register_1_];
				if (Register_2_ == handler){
					queue.splice(Register_1_, 1);
					return undefined;
				}
				Register_1_++;
			}
		}
	}
	static function initialize(object) {
		if (_fEventDispatcher == undefined){
			_fEventDispatcher = new EventDispatcher();
		}
		object.addEventListener = _fEventDispatcher.addEventListener;
		object.removeEventListener = _fEventDispatcher.removeEventListener;
		object.dispatchEvent = _fEventDispatcher.dispatchEvent;
		object.dispatchQueue = _fEventDispatcher.dispatchQueue;
	}
	function dispatchQueue(queueObj, eventObj) {
		var Register_7_ = ("__q_" + eventObj.type);
		var Register_4_ = queueObj[Register_7_];
		if (Register_4_ != undefined){
			var Register_5_ = undefined;
			for (Register_5_ in Register_4_) {
				var Register_1_ = Register_4_[Register_5_];
				var Register_3_ = typeof(Register_1_);
				if (Register_3_ == "object" || Register_3_ == "movieclip"){
					if (Register_1_.handleEvent == undefined){
						Register_1_[eventObj.type](eventObj);
					} else {
						Register_1_.handleEvent(eventObj);
					}
				} else {
					Register_1_.apply(queueObj, [eventObj]);
				}
			}
		}
	}
	function dispatchEvent(eventObj) {
		if (eventObj.target == undefined){
			eventObj.target = this;
		}
		this[(eventObj.type + "Handler")](eventObj);
		this.dispatchQueue(this, eventObj);
	}
	function addEventListener(event, handler) {
		var Register_3_ = ("__q_" + event);
		if (this[Register_3_] == undefined){
			this[Register_3_] = new Array();
		}
		_global.ASSetPropFlags(this, Register_3_, 1);
		EventDispatcher._removeEventListener(this[Register_3_], event, handler);
		this[Register_3_].push(handler);
	}
	function removeEventListener(event, handler) {
		var Register_2_ = ("__q_" + event);
		EventDispatcher._removeEventListener(this[Register_2_], event, handler);
	}
	static var _fEventDispatcher = undefined;
}
