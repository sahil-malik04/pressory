class CustomTooltip {
  init(params) {
    const eGui = (this.eGui = document.createElement('div'));
    const color = params.color || 'white';
    const data = params.api.getDisplayedRowAtIndex(params.rowIndex).data;

    eGui.classList.add('custom-tooltip');
    //@ts-ignore
    eGui.style['background-color'] = color;
    eGui.innerHTML = `<img src="{{ asset('storage/publication') }}/${data.image}" width="50px">`;
  }

  getGui() {
    return this.eGui;
  }
}