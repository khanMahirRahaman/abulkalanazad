<style>
    .upload-msg {
        min-height: 4.75em;
        font-size: inherit;
        color: #aaa;
        border-radius: .5em;
        background-color: #f4f6f9;
        justify-content: center;
        display: flex;
        align-items: center;
    }

    .dark-mode .upload-msg {
        background-color: #3f474e;
    }

    .dark-mode pre {
        color: #fff;
    }

    .upload-photo.ready #display {
        display: block;
    }

    .upload-photo.ready .buttons #reset {
        display: inline;
    }

    .upload-photo #display,
    .upload-photo .buttons #reset,
    .upload-photo.ready .upload-msg {
        display: none;
    }

    .hide {
        display: none;
    }
</style>
