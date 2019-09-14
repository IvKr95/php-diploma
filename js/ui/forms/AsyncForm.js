/**
 * AsyncForm class manages all the forms
 * of the app, which are to be submitted via ajax.
 * */
class AsyncForm {
  /** 
   * Error will be thrown if
   * the passed element not exist.
   * Saves the passed element and
   * registers events via registerEvents().
   * */
  constructor (element) {
    if (element) {
      this.element = element;
      this.submit = this.submit.bind(this);
      this.registerEvents();
    };
  }

  /**
   * When submit button is pressed calls AsyncForm.submit.
   * */
  registerEvents () {
    this.element.addEventListener('submit', this.submit);
  }

  /**
   * Collects the form data.
   * */
  getData () {
    return new FormData(this.element);
  }

  onSubmit (options) {
  }

  /**
   * Calls this.onSubmit and passes the data
   * from getData() as argument.
   * */
  submit (e) {
    this.onSubmit(this.getData());
    e.preventDefault();
  }
}
  