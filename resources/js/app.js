require('./bootstrap');
if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
    // Restart livewire on back or foward.
    Livewire.restart();
}
