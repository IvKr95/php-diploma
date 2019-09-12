/**
 * Modal class manages
 * modal windows.
 * */
class Modal {
    /**
     * Sets the current element to this.element.
     * Registers the events with Modal.registerEvents().
     * */
    constructor(element) {
      if (element) {
        this.element = element;
        this.closeBtns = this.element.querySelectorAll('.close-btn');
        this.onClose = this.onClose.bind(this);
        this.close = this.close.bind(this);
    
        this.registerEvents();
      };
    }
    /**
     * When element with .close-btn is clicked
     * closes the current window
     * (uses Modal.onClose).
     * */
    registerEvents() {
      for (const clsBtn of this.closeBtns) {
        clsBtn.addEventListener('click', this.onClose);
      };
    }
    /**
     * Handles click events on the close elements.
     * Closes the current element (Modal.close()).
     * */
    onClose(e) {
      this.close();
      e.preventDefault();
    }
    /**
     * Deletes event handlers
     * */
    unregisterEvents() {
      for (const clsBtn of this.closeBtns) {
        clsBtn.removeEventListener('click', this.onClose);
      };
    }
    /**
     * Opens a modal. Adds the 'active' class
     * to the current element.
     * */
    open() {
      this.element.classList.add('active');
    }
    /**
     * Closes a modal. Removes the 'acitve' class.
     * */
    close() {
      this.element.classList.remove('active');
    }
  }