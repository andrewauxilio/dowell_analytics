import html2canvas from 'html2canvas'
import jsPDF from 'jspdf'

export default {
  methods: {
    getPDF () {
      html2canvas(document.querySelector('#testDiv')).then(canvas => {
        var img = canvas.toDataURL('image/png')
        var doc = new jsPDF()
        doc.addImage(img, 'JPEG', 1, 1)
        doc.save('test.pdf')
      })
    }
  }
}
