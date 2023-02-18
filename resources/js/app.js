import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'
import Document from '@tiptap/extension-document'
import Paragraph from '@tiptap/extension-paragraph'
import Text from '@tiptap/extension-text'

import Alpine from 'alpinejs'

window.Alpine = Alpine

window.setupEditor = function (content) {
    return {
        editor: null,
        content: content,

        init(element) {
            this.editor = new Editor({
                element: element,
                extensions: [
                    Document,
                    Paragraph,
                    Text
                ],
                content: this.content,
                onUpdate: ({ editor }) => {
                    this.content = editor.getHTML()
                }
            })

            this.$watch('content', (content) => {
                // If the new content matches TipTap's then we just skip.
                if (content === this.editor.getHTML()) return

                /*
                  Otherwise, it means that a force external to TipTap
                  is modifying the data on this Alpine component,
                  which could be Livewire itself.
                  In this case, we just need to update TipTap's
                  content and we're good to do.
                  For more information on the `setContent()` method, see:
                    https://www.tiptap.dev/api/commands/set-content
                */
                this.editor.commands.setContent(content, false)
            })
        }
    }
}

Alpine.start()