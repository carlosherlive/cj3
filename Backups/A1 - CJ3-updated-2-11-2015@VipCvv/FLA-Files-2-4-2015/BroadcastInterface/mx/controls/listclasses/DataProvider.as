dynamic class mx.controls.listclasses.DataProvider extends Object
{
	var length, splice, dispatchEvent, sortOn, reverse, sort;
	function DataProvider(obj) {
		super();
	}
	static function Initialize(obj) {
		var Register_4_ = mixinProps;
		var Register_6_ = Register_4_.length;
		obj = obj.prototype;
		var Register_3_ = 0;
		while (Register_3_ < Register_6_){
			obj[Register_4_[Register_3_]] = mixins[Register_4_[Register_3_]];
			_global.ASSetPropFlags(obj, Register_4_[Register_3_], 1);
			Register_3_++;
		}
		mx.events.EventDispatcher.initialize(obj);
		_global.ASSetPropFlags(obj, "addEventListener", 1);
		_global.ASSetPropFlags(obj, "removeEventListener", 1);
		_global.ASSetPropFlags(obj, "dispatchEvent", 1);
		_global.ASSetPropFlags(obj, "dispatchQueue", 1);
		Object.prototype.LargestID = 0;
		Object.prototype.getID = function () {
			if (this.__ID__ == undefined){
				this.__ID__ = Object.prototype.LargestID++;
				_global.ASSetPropFlags(this, "__ID__", 1);
			}
			return this.__ID__;
		}
		_global.ASSetPropFlags(Object.prototype, "LargestID", 1);
		_global.ASSetPropFlags(Object.prototype, "getID", 1);
		return true;
	}
	function addItemAt(index, value) {
		if (index < this.length){
			this.splice(index, 0, value);
		} else if (index > this.length){
			trace("Cannot add an item past the end of the DataProvider");
			return undefined;
		}
		this[index] = value;
		this.updateViews("addItems", index, index);
	}
	function addItem(value) {
		this.addItemAt(this.length, value);
	}
	function addItemsAt(index, newItems) {
		index = Math.min(this.length, index);
		newItems.unshift(index, 0);
		this.splice.apply(this, newItems);
		newItems.splice(0, 2);
		this.updateViews("addItems", index, ((index + newItems.length) - 1));
	}
	function removeItemsAt(index, len) {
		var Register_3_ = new Array();
		var Register_2_ = 0;
		while (Register_2_ < len){
			Register_3_.push(this.getItemID(index + Register_2_));
			Register_2_++;
		}
		var Register_6_ = this.splice(index, len);
		this.dispatchEvent({type:"modelChanged", eventName:"removeItems", firstItem:index, lastItem:((index + len) - 1), removedItems:Register_6_, removedIDs:Register_3_});
	}
	function removeItemAt(index) {
		var Register_2_ = this[index];
		this.removeItemsAt(index, 1);
		return Register_2_;
	}
	function removeAll(Void) {
		this.splice(0);
		this.updateViews("removeItems", 0, (this.length - 1));
	}
	function replaceItemAt(index, itemObj) {
		if (index < 0 || index >= this.length){
			return undefined;
		}
		var Register_3_ = this.getItemID(index);
		this[index] = itemObj;
		this[index].__ID__ = Register_3_;
		this.updateViews("updateItems", index, index);
	}
	function getItemAt(index) {
		return this[index];
	}
	function getItemID(index) {
		var Register_2_ = this[index];
		if (typeof(Register_2_) != "object" && Register_2_ != undefined){
			return index;
		} else {
			return Register_2_.getID();
		}
	}
	function sortItemsBy(fieldName, order) {
		if (typeof(order) == "string"){
			this.sortOn(fieldName);
			if (order.toUpperCase() == "DESC"){
				this.reverse();
			}
		} else {
			this.sortOn(fieldName, order);
		}
		this.updateViews("sort");
	}
	function sortItems(compareFunc, optionFlags) {
		this.sort(compareFunc, optionFlags);
		this.updateViews("sort");
	}
	function editField(index, fieldName, newData) {
		this[index][fieldName] = newData;
		this.dispatchEvent({type:"modelChanged", eventName:"updateField", firstItem:index, lastItem:index, fieldName:fieldName});
	}
	function getEditingData(index, fieldName) {
		return this[index][fieldName];
	}
	function updateViews(event, first, last) {
		this.dispatchEvent({type:"modelChanged", eventName:event, firstItem:first, lastItem:last});
	}
	static var mixinProps = ["addView", "addItem", "addItemAt", "removeAll", "removeItemAt", "replaceItemAt", "getItemAt", "getItemID", "sortItemsBy", "sortItems", "updateViews", "addItemsAt", "removeItemsAt", "getEditingData", "editField"];
	static var evtDipatcher = mx.events.EventDispatcher;
	static var mixins = new DataProvider();
}
