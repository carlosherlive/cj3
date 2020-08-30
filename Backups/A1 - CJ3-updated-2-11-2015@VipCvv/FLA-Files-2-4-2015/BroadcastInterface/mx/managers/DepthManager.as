dynamic class mx.managers.DepthManager
{
	var _childCounter, createClassObject, createObject, _parent, swapDepths, _topmost, getDepth;
	function DepthManager() {
		MovieClip.prototype.createClassChildAtDepth = this.createClassChildAtDepth;
		MovieClip.prototype.createChildAtDepth = this.createChildAtDepth;
		MovieClip.prototype.setDepthTo = this.setDepthTo;
		MovieClip.prototype.setDepthAbove = this.setDepthAbove;
		MovieClip.prototype.setDepthBelow = this.setDepthBelow;
		MovieClip.prototype.findNextAvailableDepth = this.findNextAvailableDepth;
		MovieClip.prototype.shuffleDepths = this.shuffleDepths;
		MovieClip.prototype.getDepthByFlag = this.getDepthByFlag;
		MovieClip.prototype.buildDepthTable = this.buildDepthTable;
	}
	static function sortFunction(a, b) {
		if (a.getDepth() > b.getDepth()){
			return 1;
		}
		return -1;
	}
	static function test(depth) {
		if (depth == reservedDepth){
			return false;
		} else {
			return true;
		}
	}
	static function createClassObjectAtDepth(className, depthSpace, initObj) {
		var Register_1_ = undefined;
		switch (depthSpace){
		  case kCursor :
			Register_1_ = DepthManager.holder.createClassChildAtDepth(className, kTopmost, initObj);
			break;
		  case DepthManager.kTooltip :
			Register_1_ = DepthManager.holder.createClassChildAtDepth(className, kTop, initObj);
			break;
		  default :
		}
		return Register_1_;
	}
	static function createObjectAtDepth(linkageName, depthSpace, initObj) {
		var Register_1_ = undefined;
		switch (depthSpace){
		  case kCursor :
			Register_1_ = DepthManager.holder.createChildAtDepth(linkageName, kTopmost, initObj);
			break;
		  case DepthManager.kTooltip :
			Register_1_ = DepthManager.holder.createChildAtDepth(linkageName, kTop, initObj);
			break;
		  default :
		}
		return Register_1_;
	}
	function createClassChildAtDepth(className, depthFlag, initObj) {
		if (this._childCounter == undefined){
			this._childCounter = 0;
		}
		var Register_3_ = this.buildDepthTable();
		var Register_2_ = this.getDepthByFlag(depthFlag, Register_3_);
		var Register_6_ = "down";
		if (depthFlag == DepthManager.kBottom){
			Register_6_ = "up";
		}
		var Register_5_ = undefined;
		if (Register_3_[Register_2_] != undefined){
			Register_5_ = Register_2_;
			Register_2_ = this.findNextAvailableDepth(Register_2_, Register_3_, Register_6_);
		}
		var Register_4_ = this.createClassObject(className, ("depthChild" + this._childCounter++), Register_2_, initObj);
		if (Register_5_ != undefined){
			Register_3_[Register_2_] = Register_4_;
			this.shuffleDepths(Register_4_, Register_5_, Register_3_, Register_6_);
		}
		if (depthFlag == kTopmost){
			Register_4_._topmost = true;
		}
		return Register_4_;
	}
	function createChildAtDepth(linkageName, depthFlag, initObj) {
		if (this._childCounter == undefined){
			this._childCounter = 0;
		}
		var Register_3_ = this.buildDepthTable();
		var Register_2_ = this.getDepthByFlag(depthFlag, Register_3_);
		var Register_6_ = "down";
		if (depthFlag == DepthManager.kBottom){
			Register_6_ = "up";
		}
		var Register_5_ = undefined;
		if (Register_3_[Register_2_] != undefined){
			Register_5_ = Register_2_;
			Register_2_ = this.findNextAvailableDepth(Register_2_, Register_3_, Register_6_);
		}
		var Register_4_ = this.createObject(linkageName, ("depthChild" + this._childCounter++), Register_2_, initObj);
		if (Register_5_ != undefined){
			Register_3_[Register_2_] = Register_4_;
			this.shuffleDepths(Register_4_, Register_5_, Register_3_, Register_6_);
		}
		if (depthFlag == kTopmost){
			Register_4_._topmost = true;
		}
		return Register_4_;
	}
	function setDepthTo(depthFlag) {
		var Register_2_ = this._parent.buildDepthTable();
		var Register_3_ = this._parent.getDepthByFlag(depthFlag, Register_2_);
		if (Register_2_[Register_3_] != undefined){
			this.shuffleDepths(this, Register_3_, Register_2_, undefined);
		} else {
			this.swapDepths(Register_3_);
		}
		if (depthFlag == kTopmost){
			this._topmost = true;
		} else {
			delete this._topmost;
		}
	}
	function setDepthAbove(targetInstance) {
		if (targetInstance._parent != this._parent){
			return undefined;
		}
		var Register_2_ = (targetInstance.getDepth() + 1);
		var Register_3_ = this._parent.buildDepthTable();
		if (Register_3_[Register_2_] != undefined && this.getDepth() < Register_2_){
			Register_2_ = (Register_2_ - 1);
		}
		if (Register_2_ > highestDepth){
			Register_2_ = highestDepth;
		}
		if (Register_2_ == highestDepth){
			this._parent.shuffleDepths(this, Register_2_, Register_3_, "down");
		} else if (Register_3_[Register_2_] != undefined){
			this._parent.shuffleDepths(this, Register_2_, Register_3_, undefined);
		} else {
			this.swapDepths(Register_2_);
		}
	}
	function setDepthBelow(targetInstance) {
		if (targetInstance._parent != this._parent){
			return undefined;
		}
		var Register_6_ = (targetInstance.getDepth() - 1);
		var Register_3_ = this._parent.buildDepthTable();
		if (Register_3_[Register_6_] != undefined && this.getDepth() > Register_6_){
			Register_6_ = (Register_6_ + 1);
		}
		var Register_4_ = (DepthManager.lowestDepth + DepthManager.numberOfAuthortimeLayers);
		var Register_5_ = undefined;
		for (Register_5_ in Register_3_) {
			var Register_2_ = Register_3_[Register_5_];
			if (Register_2_._parent != undefined){
				Register_4_ = Math.min(Register_4_, Register_2_.getDepth());
			}
		}
		if (Register_6_ < Register_4_){
			Register_6_ = Register_4_;
		}
		if (Register_6_ == Register_4_){
			this._parent.shuffleDepths(this, Register_6_, Register_3_, "up");
		} else if (Register_3_[Register_6_] != undefined){
			this._parent.shuffleDepths(this, Register_6_, Register_3_, undefined);
		} else {
			this.swapDepths(Register_6_);
		}
	}
	function findNextAvailableDepth(targetDepth, depthTable, direction) {
		var Register_5_ = (DepthManager.lowestDepth + DepthManager.numberOfAuthortimeLayers);
		if (targetDepth < Register_5_){
			targetDepth = Register_5_;
		}
		if (depthTable[targetDepth] == undefined){
			return targetDepth;
		}
		var Register_2_ = targetDepth;
		var Register_1_ = targetDepth;
		if (direction == "down"){
			while (depthTable[Register_1_] != undefined){
				Register_1_--;
			}
			return Register_1_;
		}
		while (depthTable[Register_2_] != undefined){
			Register_2_++;
		}
		return Register_2_;
	}
	function shuffleDepths(subject, targetDepth, depthTable, direction) {
		var Register_9_ = (DepthManager.lowestDepth + DepthManager.numberOfAuthortimeLayers);
		var Register_8_ = Register_9_;
		var Register_5_ = undefined;
		for (Register_5_ in depthTable) {
			var Register_7_ = depthTable[Register_5_];
			if (Register_7_._parent != undefined){
				Register_9_ = Math.min(Register_9_, Register_7_.getDepth());
			}
		}
		if (direction == undefined){
			if (subject.getDepth() > targetDepth){
				direction = "up";
			} else {
				direction = "down";
			}
		}
		var Register_1_ = new Array();
		for (Register_5_ in depthTable) {
			var Register_7_ = depthTable[Register_5_];
			if (Register_7_._parent != undefined){
				Register_1_.push(Register_7_);
			}
		}
		Register_1_.sort(DepthManager.sortFunction);
		if (direction == "up"){
			var Register_3_ = undefined;
			var Register_B_ = undefined;
			while (Register_1_.length > 0){
				Register_3_ = Register_1_.pop();
				if (Register_3_ == subject){
					break;
				}
			}
			while (Register_1_.length > 0){
				Register_B_ = subject.getDepth();
				Register_3_ = Register_1_.pop();
				var Register_4_ = Register_3_.getDepth();
				if (Register_B_ > (Register_4_ + 1)){
					if (Register_4_ >= 0){
						subject.swapDepths(Register_4_ + 1);
					} else {
						if (Register_B_ > Register_8_ && Register_4_ < Register_8_){
							subject.swapDepths(Register_8_);
						}
					}
				}
				subject.swapDepths(Register_3_);
				if (Register_4_ == targetDepth){
					break;
				}
			}
		} else if (direction == "down"){
			Register_3_ = undefined;
			while (Register_1_.length > 0){
				Register_3_ = Register_1_.shift();
				if (Register_3_ == subject){
					break;
				}
			}
			while (Register_1_.length > 0){
				Register_B_ = Register_3_.getDepth();
				Register_3_ = Register_1_.shift();
				var Register_4_ = Register_3_.getDepth();
				if (Register_B_ < (Register_4_ - 1) && Register_4_ > 0){
					subject.swapDepths(Register_4_ - 1);
				}
				subject.swapDepths(Register_3_);
				if (Register_4_ == targetDepth){
					break;
				}
			}
		}
	}
	function getDepthByFlag(depthFlag, depthTable) {
		var Register_2_ = 0;
		if (depthFlag == kTop || depthFlag == DepthManager.kNotopmost){
			var Register_5_ = 0;
			var Register_7_ = false;
			var Register_8_ = undefined;
			for (Register_8_ in depthTable) {
				var Register_9_ = depthTable[Register_8_];
				var Register_3_ = typeof(Register_9_);
				if (Register_3_ == "movieclip" || (Register_3_ == "object" && Register_9_.__getTextFormat != undefined)){
					if (Register_9_.getDepth() <= highestDepth){
						if (!Register_9_._topmost){
							Register_2_ = Math.max(Register_2_, Register_9_.getDepth());
						} else if (!Register_7_){
							Register_5_ = Register_9_.getDepth();
							Register_7_ = true;
						} else {
							Register_5_ = Math.min(Register_5_, Register_9_.getDepth());
						}
					}
				}
			}
			Register_2_ = (Register_2_ + 20);
			if (Register_7_){
				if (Register_2_ >= Register_5_){
					Register_2_ = (Register_5_ - 1);
				}
			}
		} else if (depthFlag == DepthManager.kBottom){
			for (Register_8_ in depthTable) {
				var Register_9_ = depthTable[Register_8_];
				var Register_3_ = typeof(Register_9_);
				if (Register_3_ == "movieclip" || (Register_3_ == "object" && Register_9_.__getTextFormat != undefined)){
					if (Register_9_.getDepth() <= highestDepth){
						Register_2_ = Math.min(Register_2_, Register_9_.getDepth());
					}
				}
			}
			Register_2_ = (Register_2_ - 20);
		} else if (depthFlag == kTopmost){
			for (Register_8_ in depthTable) {
				var Register_9_ = depthTable[Register_8_];
				var Register_3_ = typeof(Register_9_);
				if (Register_3_ == "movieclip" || (Register_3_ == "object" && Register_9_.__getTextFormat != undefined)){
					if (Register_9_.getDepth() <= highestDepth){
						Register_2_ = Math.max(Register_2_, Register_9_.getDepth());
					}
				}
			}
			Register_2_ = (Register_2_ + 100);
		}
		if (Register_2_ >= highestDepth){
			Register_2_ = highestDepth;
		}
		var Register_6_ = (DepthManager.lowestDepth + DepthManager.numberOfAuthortimeLayers);
		for (var Register_9_ in depthTable) {
			var Register_4_ = depthTable[Register_9_];
			if (Register_4_._parent != undefined){
				Register_6_ = Math.min(Register_6_, Register_4_.getDepth());
			}
		}
		if (Register_2_ <= Register_6_){
			Register_2_ = Register_6_;
		}
		return Register_2_;
	}
	function buildDepthTable(Void) {
		var Register_5_ = new Array();
		var Register_4_ = undefined;
		for (Register_4_ in this) {
			var Register_2_ = this[Register_4_];
			var Register_3_ = typeof(Register_2_);
			if (Register_3_ == "movieclip" || (Register_3_ == "object" && Register_2_.__getTextFormat != undefined)){
				if (Register_2_._parent == this){
					Register_5_[Register_2_.getDepth()] = Register_2_;
				}
			}
		}
		return Register_5_;
	}
	static var reservedDepth = 1048575;
	static var highestDepth = 1048574;
	static var lowestDepth = -16383;
	static var numberOfAuthortimeLayers = 383;
	static var kCursor = 101;
	static var kTooltip = 102;
	static var kTop = 201;
	static var kBottom = 202;
	static var kTopmost = 203;
	static var kNotopmost = 204;
	static var holder = _root.createEmptyMovieClip("reserved", reservedDepth);
	static var __depthManager = new DepthManager();
}
