dynamic class mx.controls.scrollClasses.ScrollBar extends mx.core.UIComponent
{
	var isScrolling, scrollTrack_mc, scrollThumb_mc, __height, tabEnabled, focusEnabled, boundingBox_mc, setSkin, upArrow_mc, _minHeight, _minWidth, downArrow_mc, createObject, createClassObject, enabled, Register_2_, _height, dispatchEvent, minMode, maxMode, plusMode, minusMode, _parent, getStyle, scrolling, _ymouse;
	function ScrollBar() {
		super();
	}
	function get scrollPosition() {
		return this._scrollPosition;
	}
	function set scrollPosition(pos) {
		this._scrollPosition = pos;
		if (this.isScrolling != true){
			pos = Math.min(pos, this.maxPos);
			pos = Math.max(pos, this.minPos);
			var Register_3_ = ((((pos - this.minPos)) * ((this.scrollTrack_mc.height - this.scrollThumb_mc._height))) / ((this.maxPos - this.minPos)) + this.scrollTrack_mc.top);
			this.scrollThumb_mc.move(0, Register_3_);
		}
	}
	function get pageScrollSize() {
		return this.largeScroll;
	}
	function set pageScrollSize(lScroll) {
		this.largeScroll = lScroll;
	}
	function set lineScrollSize(sScroll) {
		this.smallScroll = sScroll;
	}
	function get lineScrollSize() {
		return this.smallScroll;
	}
	function get virtualHeight() {
		return this.__height;
	}
	function init(Void) {
		super.init();
		this._scrollPosition = 0;
		this.tabEnabled = false;
		this.focusEnabled = false;
		this.boundingBox_mc._visible = false;
		this.boundingBox_mc._width = this.boundingBox_mc._height = 0;
	}
	function createChildren(Void) {
		if (this.scrollTrack_mc == undefined){
			this.setSkin(skinIDTrack, this.scrollTrackName);
		}
		this.scrollTrack_mc.visible = false;
		var Register_3_ = new Object();
		Register_3_.enabled = false;
		Register_3_.preset = mx.controls.SimpleButton.falseDisabled;
		Register_3_.initProperties = 0;
		Register_3_.autoRepeat = true;
		Register_3_.tabEnabled = false;
		var Register_2_ = undefined;
		if (this.upArrow_mc == undefined){
			Register_2_ = this.createButton(this.upArrowName, "upArrow_mc", skinIDUpArrow, Register_3_);
		}
		Register_2_.buttonDownHandler = this.onUpArrow;
		Register_2_.clickHandler = this.onScrollChanged;
		this._minHeight = Register_2_.height;
		this._minWidth = Register_2_.width;
		if (this.downArrow_mc == undefined){
			Register_2_ = this.createButton(this.downArrowName, "downArrow_mc", skinIDDownArrow, Register_3_);
		}
		Register_2_.buttonDownHandler = this.onDownArrow;
		Register_2_.clickHandler = this.onScrollChanged;
		this._minHeight +=  Register_2_.height;
	}
	function createButton(linkageName, id, skinID, o) {
		if (skinID == skinIDUpArrow){
			o.falseUpSkin = this.upArrowUpName;
			o.falseDownSkin = this.upArrowDownName;
			o.falseOverSkin = this.upArrowOverName;
		} else {
			o.falseUpSkin = this.downArrowUpName;
			o.falseDownSkin = this.downArrowDownName;
			o.falseOverSkin = this.downArrowOverName;
		}
		var Register_3_ = this.createObject(linkageName, id, skinID, o);
		this[id].visible = false;
		this[id].useHandCursor = false;
		return Register_3_;
	}
	function createThumb(Void) {
		var Register_2_ = new Object();
		Register_2_.validateNow = true;
		Register_2_.tabEnabled = false;
		Register_2_.leftSkin = this.thumbTopName;
		Register_2_.middleSkin = this.thumbMiddleName;
		Register_2_.rightSkin = this.thumbBottomName;
		Register_2_.gripSkin = this.thumbGripName;
		this.createClassObject(mx.controls.scrollClasses.ScrollThumb, "scrollThumb_mc", skinIDThumb, Register_2_);
	}
	function setScrollProperties(pSize, mnPos, mxPos, ls) {
		var Register_4_ = undefined;
		var Register_2_ = this.scrollTrack_mc;
		this.pageSize = pSize;
		this.largeScroll = (ls != undefined && ls > 0) ? ls : pSize;
		this.minPos = Math.max(mnPos, 0);
		this.maxPos = Math.max(mxPos, 0);
		this._scrollPosition = Math.max(this.minPos, this._scrollPosition);
		this._scrollPosition = Math.min(this.maxPos, this._scrollPosition);
		if ((this.maxPos - this.minPos) > 0 && this.enabled){
			var Register_5_ = this._scrollPosition;
			if (!this.initializing){
				this.upArrow_mc.enabled = true;
				this.downArrow_mc.enabled = true;
			}
			Register_2_.onPress = Register_2_.onDragOver = this.startTrackScroller;
			Register_2_.onRelease = this.releaseScrolling;
			Register_2_.onDragOut = Register_2_.stopScrolling = this.stopScrolling;
			Register_2_.onReleaseOutside = this.releaseScrolling;
			Register_2_.useHandCursor = false;
			if (this.scrollThumb_mc == undefined){
				this.createThumb();
			}
			var Register_3_ = this.scrollThumb_mc;
			if (this.scrollTrackOverName.length > 0){
				Register_2_.onRollOver = this.trackOver;
				Register_2_.onRollOut = this.trackOut;
			}
			Register_4_ = this.pageSize / ((this.maxPos - this.minPos) + this.pageSize) * Register_2_.height;
			if (Register_4_ < Register_3_.minHeight){
				if (Register_2_.height < Register_3_.minHeight){
					Register_3_.visible = false;
				} else {
					Register_4_ = Register_3_.minHeight;
					Register_3_.visible = true;
					Register_3_.setSize(this._minWidth, (Register_3_.minHeight + 0));
				}
			} else {
				Register_3_.visible = true;
				Register_3_.setSize(this._minWidth, Register_4_);
			}
			Register_3_.setRange((this.upArrow_mc.height + 0), ((this.virtualHeight - this.downArrow_mc.height) - Register_3_.height), this.minPos, this.maxPos);
			Register_5_ = Math.min(Register_5_, this.maxPos);
			this.scrollPosition = Math.max(Register_5_, this.minPos);
		} else {
			this.scrollThumb_mc.visible = false;
			if (!this.initializing){
				this.upArrow_mc.enabled = false;
				this.downArrow_mc.enabled = false;
			}
			delete Register_2_.onPress;
			delete Register_2_.onDragOver;
			delete Register_2_.onRelease;
			delete Register_2_.onDragOut;
			delete Register_2_.onRollOver;
			delete Register_2_.onRollOut;
			delete Register_2_.onReleaseOutside;
		}
		if (this.initializing){
			this.scrollThumb_mc.visible = false;
		}
	}
	function setEnabled(enabledFlag) {
		super.setEnabled(enabledFlag);
		this.setScrollProperties(this.pageSize, this.minPos, this.maxPos, this.largeScroll);
	}
	function draw(Void) {
		if (this.initializing){
			this.initializing = false;
			this.scrollTrack_mc.visible = true;
			this.upArrow_mc.visible = true;
			this.downArrow_mc.visible = true;
		}
		this.size();
	}
	function size(Void) {
		if (this._height == 1){
			return undefined;
		}
		if (this.upArrow_mc == undefined){
			return undefined;
		}
		var Register_3_ = this.upArrow_mc.height;
		var Register_2_ = this.downArrow_mc.height;
		this.upArrow_mc.move(0, 0);
		var Register_4_ = this.scrollTrack_mc;
		Register_4_._y = Register_3_;
		Register_4_._height = (this.virtualHeight - Register_3_) - Register_2_;
		this.downArrow_mc.move(0, (this.virtualHeight - Register_2_));
		this.setScrollProperties(this.pageSize, this.minPos, this.maxPos, this.largeScroll);
	}
	function dispatchScrollEvent(detail) {
		this.dispatchEvent({type:"scroll", detail:detail});
	}
	function isScrollBarKey(k) {
		if (k == 36){
			if (this.scrollPosition != 0){
				this.scrollPosition = 0;
				this.dispatchScrollEvent(this.minMode);
			}
			return true;
		} else if (k == 35){
			if (this.scrollPosition < this.maxPos){
				this.scrollPosition = this.maxPos;
				this.dispatchScrollEvent(this.maxMode);
			}
			return true;
		}
		return false;
	}
	function scrollIt(inc, mode) {
		var Register_3_ = this.smallScroll;
		if (inc != "Line"){
			Register_3_ = this.largeScroll == 0 ? this.pageSize : this.largeScroll;
		}
		var Register_2_ = (this._scrollPosition + mode * Register_3_);
		if (Register_2_ > this.maxPos){
			Register_2_ = this.maxPos;
		} else if (Register_2_ < this.minPos){
			Register_2_ = this.minPos;
		}
		if (this.scrollPosition != Register_2_){
			this.scrollPosition = Register_2_;
			var Register_4_ = mode < 0 ? this.minusMode : this.plusMode;
			this.dispatchScrollEvent(inc + Register_4_);
		}
	}
	function startTrackScroller(Void) {
		this._parent.pressFocus();
		if (this._parent.scrollTrackDownName.length > 0){
			if (this._parent.scrollTrackDown_mc == undefined){
				this._parent.setSkin(skinIDTrackDown, this.scrollTrackDownName);
			} else {
				this._parent.scrollTrackDown_mc.visible = true;
			}
		}
		this._parent.trackScroller();
		this._parent.scrolling = setInterval(this._parent, "scrollInterval", this.getStyle("repeatDelay"), "Page", -1);
	}
	function scrollInterval(inc, mode) {
		clearInterval(this.scrolling);
		if (inc == "Page"){
			this.trackScroller();
		} else {
			this.scrollIt(inc, mode);
		}
		this.scrolling = setInterval(this, "scrollInterval", this.getStyle("repeatInterval"), inc, mode);
	}
	function trackScroller(Void) {
		if ((this.scrollThumb_mc._y + this.scrollThumb_mc.height) < this._ymouse){
			this.scrollIt("Page", 1);
		} else if (this.scrollThumb_mc._y > this._ymouse){
			this.scrollIt("Page", -1);
		}
	}
	function dispatchScrollChangedEvent(Void) {
		this.dispatchEvent({type:"scrollChanged"});
	}
	function stopScrolling(Void) {
		clearInterval(this._parent.scrolling);
		this._parent.scrollTrackDown_mc.visible = false;
	}
	function releaseScrolling(Void) {
		this._parent.releaseFocus();
		this.stopScrolling();
		this._parent.dispatchScrollChangedEvent();
	}
	function trackOver(Void) {
		if (this._parent.scrollTrackOverName.length > 0){
			if (this._parent.scrollTrackOver_mc == undefined){
				this._parent.setSkin(skinIDTrackOver, this.scrollTrackOverName);
			} else {
				this._parent.scrollTrackOver_mc.visible = true;
			}
		}
	}
	function trackOut(Void) {
		this._parent.scrollTrackOver_mc.visible = false;
	}
	function onUpArrow(Void) {
		this._parent.scrollIt("Line", -1);
	}
	function onDownArrow(Void) {
		this._parent.scrollIt("Line", 1);
	}
	function onScrollChanged(Void) {
		this._parent.dispatchScrollChangedEvent();
	}
	static var symbolOwner = mx.core.UIComponent;
	var className = "ScrollBar";
	var minPos = 0;
	var maxPos = 0;
	var pageSize = 0;
	var largeScroll = 0;
	var smallScroll = 1;
	var _scrollPosition = 0;
	var scrollTrackName = "ScrollTrack";
	var scrollTrackOverName = "";
	var scrollTrackDownName = "";
	var upArrowName = "BtnUpArrow";
	var upArrowUpName = "ScrollUpArrowUp";
	var upArrowOverName = "ScrollUpArrowOver";
	var upArrowDownName = "ScrollUpArrowDown";
	var downArrowName = "BtnDownArrow";
	var downArrowUpName = "ScrollDownArrowUp";
	var downArrowOverName = "ScrollDownArrowOver";
	var downArrowDownName = "ScrollDownArrowDown";
	var thumbTopName = "ScrollThumbTopUp";
	var thumbMiddleName = "ScrollThumbMiddleUp";
	var thumbBottomName = "ScrollThumbBottomUp";
	var thumbGripName = "ScrollThumbGripUp";
	static var skinIDTrack = 0;
	static var skinIDTrackOver = 1;
	static var skinIDTrackDown = 2;
	static var skinIDUpArrow = 3;
	static var skinIDDownArrow = 4;
	static var skinIDThumb = 5;
	var idNames = new Array("scrollTrack_mc", "scrollTrackOver_mc", "scrollTrackDown_mc", "upArrow_mc", "downArrow_mc");
	var clipParameters = {minPos:1, maxPos:1, pageSize:1, scrollPosition:1, lineScrollSize:1, pageScrollSize:1, visible:1, enabled:1};
	static var mergedClipParameters = mx.core.UIObject.mergeClipParameters(ScrollBar.prototype.clipParameters, mx.core.UIComponent.prototype.clipParameters);
	var initializing = true;
}
