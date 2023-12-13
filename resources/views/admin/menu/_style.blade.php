<style>
    /**
     * Nestable
     */

    .dd {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        list-style: none;x
    font-size: 13px;
        line-height: 20px;
    }

    .dd-list {
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .dd-item>button+.dd-handle>.drag-handle {
        transform: translate3d(-2rem,0,0);
        margin-right: .25rem;
    }

    .dd-item>button+.dd-handle {
        padding-left: 2.5rem;
    }

    .dd-list .dd-list {
        padding-left: 30px;
    }

    .dd-collapsed .dd-list {
        display: none;
    }

    .dd-item,
    .dd-empty,
    .dd-placeholder {
        position: relative;
        margin: 0;
        padding: 0;
    }

    .dd-handle {
        display: flex;
        align-items: center;
        margin: 5px 0;
        padding: .50rem 1rem;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ecedf1;
        background: #fafafa;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        line-height: 22px;
    }

    .dd-handle:hover {
        color: #2ea8e5;
        background: #fff;
    }

    .dd-item:first-child>.dd-nodrag {
        margin-top: 2rem
    }

    .dd-item > button {
        position: absolute;
        left: 2rem;
        top: 1.125rem;
        padding: 0 0 0 20px;
        width: 20px;
        height: 20px;
        border: 0;
        line-height: 1;
        white-space: nowrap;
        vertical-align: middle;
        background-color: transparent;
        background-repeat: no-repeat;
        background-position: 50%;
        background-size: 10px;
        overflow: hidden;
    }

    .dd-item > button[data-action="collapse"] {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg aria-hidden='true' data-prefix='fas' data-icon='caret-down' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-caret-down fa-w-10 fa-3x'%3E%3Cpath fill='currentColor' d='M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z'/%3E%3C/svg%3E");
    }

    .dd-item > button[data-action="expand"] {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg aria-hidden='true' data-prefix='fas' data-icon='caret-right' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-caret-right fa-w-10 fa-3x'%3E%3Cpath fill='currentColor' d='M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z'/%3E%3C/svg%3E");
    }

    .drag-handle {
        display: inline-block;
        margin: 0 .5em;
        width: 6px;
        transform: translate3d(-.5em,0,0);
        cursor: move;
        cursor: grab;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .dd-placeholder {
        min-height: 30px;
        background: rgba(52, 108, 176, .12);
        border: 1px dashed #346cb0
    }

    .dd-placeholder,
    .dd-empty {
        position: relative;
        margin: 0;
        padding: 0;
    }

    .dd-empty {
        border: 1px dashed #bbb;
        min-height: 100px;
        background-color: #e5e5e5;
    }

    .dd-dragel {
        position: absolute;
        pointer-events: none;
        z-index: 9999;
    }

    .dd-dragel > .dd-item .dd-handle {
        margin-top: 0;
    }

    .dd-dragel .dd-handle {
        -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        -ms-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
    }

    /**
     * Nestable Extras
     */

    .nestable-lists {
        display: block;
        clear: both;
        padding: 30px 0;
        width: 100%;
        border: 0;
        border-top: 2px solid #ddd;
        border-bottom: 2px solid #ddd;
    }

    #nestable-menu {
        padding: 0;
        margin: 20px 0;
    }

    .nestable-dark-theme .dd-handle {
        color: #fff;
        border: 1px solid #999;
        background: #bbb;
    }

    .nestable-dark-theme .dd-handle:hover {
        background: #bbb;
    }

    .nestable-dark-theme .dd-item > button:before {
        color: #fff;
    }

    @media only screen and (min-width: 700px) {

        .dd {
            float: left;
            width: 100%;
        }

        .dd + .dd {
            margin-left: 2%;
        }
    }

    .dd-hover > .dd-handle {
        background: #2ea8e5 !important;
    }

    /**
     * Nestable Draggable Handles
     */

    .dd3-content {
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px 5px 40px;
        color: #333;
        text-decoration: none;
        font-weight: bold;
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background:         linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box; -moz-box-sizing: border-box;
    }

    .dd3-content:hover {
        color: #2ea8e5;
    }

    .dd-dragel > .dd3-item > .dd3-content {
        margin: 0;
    }

    .dd3-item > button {
        margin-left: 36px;
    }

    /*.drag-handle {*/
    /*    position: absolute;*/
    /*    margin: 0;*/
    /*    left: 0;*/
    /*    top: 0;*/
    /*    cursor: move;*/
    /*    width: 36px;*/
    /*    text-indent: 100%;*/
    /*    white-space: nowrap;*/
    /*    overflow: hidden;*/
    /*    border: 1px solid #aaa;*/
    /*    background: #aaa;*/
    /*}*/

    /*.drag-handle:before {*/
    /*    content: '≡';*/
    /*    display: block;*/
    /*    position: absolute;*/
    /*    left: 0;*/
    /*    top: 3px;*/
    /*    width: 100%;*/
    /*    text-align: center;*/
    /*    text-indent: 0;*/
    /*    color: #fff;*/
    /*    font-size: 20px;*/
    /*    font-weight: normal;*/
    /*}*/

    /*.drag-handle:hover {*/
    /*    background: #aaa;*/
    /*}*/
</style>
