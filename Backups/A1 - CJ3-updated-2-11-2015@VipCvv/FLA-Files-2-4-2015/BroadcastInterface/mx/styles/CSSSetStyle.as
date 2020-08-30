dynamic class mx.styles.CSSSetStyle
{
	var styleName, stylecache, _color, setColor, invalidateStyle;
	function CSSSetStyle() {
	}
	function _setStyle(styleProp, newValue) {
		this[styleProp] = newValue;
		if (mx.styles.StyleManager.TextStyleMap[styleProp] != undefined){
			if (styleProp == "color"){
				if (isNaN(newValue)){
					newValue = mx.styles.StyleManager.getColorName(newValue);
					this[styleProp] = newValue;
					if (newValue == undefined){
						return undefined;
					}
				}
			}
			_level0.changeTextStyleInChildren(styleProp);
			return undefined;
		}
		if (mx.styles.StyleManager.isColorStyle(styleProp)){
			if (isNaN(newValue)){
				newValue = mx.styles.StyleManager.getColorName(newValue);
				this[styleProp] = newValue;
				if (newValue == undefined){
					return undefined;
				}
			}
			if (styleProp == "themeColor"){
				var Register_7_ = mx.styles.StyleManager.colorNames.haloBlue;
				var Register_6_ = mx.styles.StyleManager.colorNames.haloGreen;
				var Register_8_ = mx.styles.StyleManager.colorNames.haloOrange;
				var Register_4_ = {};
				Register_4_[Register_7_] = 12188666;
				Register_4_[Register_6_] = 13500353;
				Register_4_[Register_8_] = 16766319;
				var Register_5_ = {};
				Register_5_[Register_7_] = 13958653;
				Register_5_[Register_6_] = 14942166;
				Register_5_[Register_8_] = 16772787;
				var Register_9_ = Register_4_[newValue];
				var Register_A_ = Register_5_[newValue];
				if (Register_9_ == undefined){
					Register_9_ = newValue;
				}
				if (Register_A_ == undefined){
					Register_A_ = newValue;
				}
				this.setStyle("selectionColor", Register_9_);
				this.setStyle("rollOverColor", Register_A_);
			}
			_level0.changeColorStyleInChildren(this.styleName, styleProp, newValue);
		} else {
			if (styleProp == "backgroundColor" && isNaN(newValue)){
				newValue = mx.styles.StyleManager.getColorName(newValue);
				this[styleProp] = newValue;
				if (newValue == undefined){
					return undefined;
				}
			}
			_level0.notifyStyleChangeInChildren(this.styleName, styleProp, newValue);
		}
	}
	function changeTextStyleInChildren(styleProp) {
		var Register_4_ = getTimer();
		var Register_5_ = undefined;
		for (Register_5_ in this) {
			var Register_2_ = this[Register_5_];
			if (Register_2_._parent == this){
				if (Register_2_.searchKey != Register_4_){
					if (Register_2_.stylecache != undefined){
						delete Register_2_.stylecache.tf;
						delete Register_2_.stylecache[styleProp];
					}
					Register_2_.invalidateStyle(styleProp);
					Register_2_.changeTextStyleInChildren(styleProp);
					Register_2_.searchKey = Register_4_;
				}
			}
		}
	}
	function changeColorStyleInChildren(sheetName, colorStyle, newValue) {
		var Register_6_ = getTimer();
		var Register_7_ = undefined;
		for (Register_7_ in this) {
			var Register_2_ = this[Register_7_];
			if (Register_2_._parent == this){
				if (Register_2_.searchKey != Register_6_){
					if ((Register_2_.getStyleName() == sheetName || sheetName == undefined) || (sheetName == "_global")){
						if (Register_2_.stylecache != undefined){
							delete Register_2_.stylecache[colorStyle];
						}
						if (typeof(Register_2_._color) == "string"){
							if (Register_2_._color == colorStyle){
								var Register_4_ = Register_2_.getStyle(colorStyle);
								if (colorStyle == "color"){
									if (this.stylecache.tf.color != undefined){
										this.stylecache.tf.color = Register_4_;
									}
								}
								Register_2_.setColor(Register_4_);
							}
						} else if (Register_2_._color[colorStyle] != undefined){
							if (typeof(Register_2_) != "movieclip"){
								Register_2_._parent.invalidateStyle();
							} else {
								Register_2_.invalidateStyle(colorStyle);
							}
						}
					}
					Register_2_.changeColorStyleInChildren(sheetName, colorStyle, newValue);
					Register_2_.searchKey = Register_6_;
				}
			}
		}
	}
	function notifyStyleChangeInChildren(sheetName, styleProp, newValue) {
		var Register_5_ = getTimer();
		var Register_6_ = undefined;
		for (Register_6_ in this) {
			var Register_2_ = this[Register_6_];
			if (Register_2_._parent == this){
				if (Register_2_.searchKey != Register_5_){
					if ((Register_2_.styleName == sheetName || Register_2_.styleName != undefined && typeof(Register_2_.styleName) == "movieclip") || sheetName == undefined){
						if (Register_2_.stylecache != undefined){
							delete Register_2_.stylecache[styleProp];
							delete Register_2_.stylecache.tf;
						}
						delete Register_2_.enabledColor;
						Register_2_.invalidateStyle(styleProp);
					}
					Register_2_.notifyStyleChangeInChildren(sheetName, styleProp, newValue);
					Register_2_.searchKey = Register_5_;
				}
			}
		}
	}
	function setStyle(styleProp, newValue) {
		if (this.stylecache != undefined){
			delete this.stylecache[styleProp];
			delete this.stylecache.tf;
		}
		this[styleProp] = newValue;
		if (mx.styles.StyleManager.isColorStyle(styleProp)){
			if (isNaN(newValue)){
				newValue = mx.styles.StyleManager.getColorName(newValue);
				this[styleProp] = newValue;
				if (newValue == undefined){
					return undefined;
				}
			}
			if (styleProp == "themeColor"){
				var Register_A_ = mx.styles.StyleManager.colorNames.haloBlue;
				var Register_9_ = mx.styles.StyleManager.colorNames.haloGreen;
				var Register_B_ = mx.styles.StyleManager.colorNames.haloOrange;
				var Register_6_ = {};
				Register_6_[Register_A_] = 12188666;
				Register_6_[Register_9_] = 13500353;
				Register_6_[Register_B_] = 16766319;
				var Register_7_ = {};
				Register_7_[Register_A_] = 13958653;
				Register_7_[Register_9_] = 14942166;
				Register_7_[Register_B_] = 16772787;
				var Register_C_ = Register_6_[newValue];
				var Register_D_ = Register_7_[newValue];
				if (Register_C_ == undefined){
					Register_C_ = newValue;
				}
				if (Register_D_ == undefined){
					Register_D_ = newValue;
				}
				this.setStyle("selectionColor", Register_C_);
				this.setStyle("rollOverColor", Register_D_);
			}
			if (typeof(this._color) == "string"){
				if (this._color == styleProp){
					if (styleProp == "color"){
						if (this.stylecache.tf.color != undefined){
							this.stylecache.tf.color = newValue;
						}
					}
					this.setColor(newValue);
				}
			} else if (this._color[styleProp] != undefined){
				this.invalidateStyle(styleProp);
			}
			this.changeColorStyleInChildren(undefined, styleProp, newValue);
		} else {
			if (styleProp == "backgroundColor" && isNaN(newValue)){
				newValue = mx.styles.StyleManager.getColorName(newValue);
				this[styleProp] = newValue;
				if (newValue == undefined){
					return undefined;
				}
			}
			this.invalidateStyle(styleProp);
		}
		if (mx.styles.StyleManager.isInheritingStyle(styleProp) || styleProp == "styleName"){
			var Register_8_ = undefined;
			var Register_5_ = newValue;
			if (styleProp == "styleName"){
				Register_8_ = typeof(newValue) == "string" ? _global.styles[newValue] : Register_5_;
				Register_5_ = Register_8_.themeColor;
				if (Register_5_ != undefined){
					Register_8_.rollOverColor = Register_8_.selectionColor = Register_5_;
				}
			}
			this.notifyStyleChangeInChildren(undefined, styleProp, newValue);
		}
	}
	static function enableRunTimeCSS() {
	}
	static function classConstruct() {
		var Register_2_ = MovieClip.prototype;
		var Register_1_ = CSSSetStyle.prototype;
		mx.styles.CSSStyleDeclaration.prototype.setStyle = Register_1_._setStyle;
		Register_2_.changeTextStyleInChildren = Register_1_.changeTextStyleInChildren;
		Register_2_.changeColorStyleInChildren = Register_1_.changeColorStyleInChildren;
		Register_2_.notifyStyleChangeInChildren = Register_1_.notifyStyleChangeInChildren;
		Register_2_.setStyle = Register_1_.setStyle;
		var Register_3_ = TextField.prototype;
		Register_3_.setStyle = Register_2_.setStyle;
		Register_3_.changeTextStyleInChildren = Register_1_.changeTextStyleInChildren;
		return true;
	}
	static var classConstructed = CSSSetStyle.classConstruct();
	static var CSSStyleDeclarationDependency = mx.styles.CSSStyleDeclaration;
}
