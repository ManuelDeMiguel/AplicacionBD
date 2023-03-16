unction} [fn] - optional callback function to use in the "serialize" event for this call
 * @param {EventTarget} [eventTarget] - optional EventTarget instance to emit the "serialize" event on (defaults to `node`)
 * return {String}
 * @public
 */

function serialize (node, context, fn, eventTarget) {
  if (!node) return '';
  if ('function' === typeof context) {
    fn = context;
    context = null;
  }
  if (!context) context = null;

  var rtn;
  var nodeType = node.nodeType;

  if (!nodeType && 'number' === typeof node.length) {
    // assume it's a NodeList or Array of Nodes
    rtn = exports.serializeNodeList(node, context, fn);
  } else {

    if ('function' === typeof fn) {
      // one-time "serialize" event listener
      node.addEventListener('serialize', fn, false);
    }

    // emit a custom "serialize" event on `node`, in case there
    // are event listeners for custom serialization of this node
    var e = new CustomEvent('serialize', {
      bubbles: true,
      cancelable: true,
      detail: {
        serialize: null,
        context: context
      }
    });

    e.serializeTarget = node;

    var target = eventTarget || node;
    var cancelled = !target.dispatchEvent(e);

    // `e.detail.serialize` can be set to a:
    //   String - returned directly
    //   Node   - goes through serializer logic instead of `node`
    //   Anything else - get Stringified first, and then returned directly
    var s = e.detail.serialize;
    if (s != null) {
      if ('string' === typeof s) {
        rtn = s;
      } else if ('number' === typeof s.nodeType) {
        // make it go through the serialization logic
        rtn = serialize(s