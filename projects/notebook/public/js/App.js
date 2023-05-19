class App
{
    constructor(root, max = 10)
    {
        this.root = root;
        this.MAX = max;
        this.doc = document;
    }
    
    list(obj, _page = 1, _select = (_page - 1) * this.MAX) {
        const select = _select;
        const page = _page;
        let count = obj.length;
        let h6, div_accordion, div_card, div_card_header, h5, btn_collapse,
            div_collapse_body, div_card_body, div_card_subbody,
            div_inline_block, img_thumbnail, div_inline_subblock, h5_card_title,
            p_one, small, p_two, span_p_two, text_node_p_two, p_three,
            span_p_three, text_node_p_three, p_four, span_p_four,
            text_node_p_four, btn_tools, img_tools, btn_delete, img_delete,
            div_pagination, btn_pagination;

        h6 = document.createElement('h6');
        h6.classList.add('border-bottom');
        h6.classList.add('border-gray');
        h6.classList.add('pb-2');
        h6.classList.add('mb-0');
        h6.classList.add('text-muted');
        h6.innerText = 'Список контактов';

        div_accordion = document.createElement('div');
        div_accordion.id = 'accordion';
        div_accordion.classList.add('mt-3');

        for (let i = (page - 1) * this.MAX; i < page * this.MAX; i++) {
            if (i == count) {
                break;
            }

            div_card = document.createElement('div');
            div_card.classList.add('card');
            div_accordion.appendChild(div_card);
            
            div_card_header = document.createElement('div');
            div_card_header.id = 'heading' + i;
            div_card_header.classList.add('card-header');
            div_card.appendChild(div_card_header);

            h5 = document.createElement('h5');
            h5.classList.add('mb-0');
            h5.id = i;
            div_card_header.appendChild(h5);

            btn_collapse = document.createElement('button');
            btn_collapse.classList.add('btn');
            btn_collapse.classList.add('btn-link');
            if (select == i) {
                btn_collapse.setAttribute('aria-expanded', 'true');
            } else {
                btn_collapse.classList.add('collapsed');
                btn_collapse.setAttribute('aria-expanded', 'false');
            }
            btn_collapse.setAttribute('data-toggle', 'collapse');
            btn_collapse.setAttribute('data-target', '#collapse' + i);
            btn_collapse.setAttribute('aria-controls', 'collapse' + i);
            btn_collapse.innerText = obj[i].fullname;
            h5.appendChild(btn_collapse);

            div_collapse_body = document.createElement('div');
            div_collapse_body.id = 'collapse' + i;
            div_collapse_body.classList.add('collapse');
            if (select == i) {
                div_collapse_body.classList.add('show');
            }
            div_collapse_body.setAttribute('aria-labelledby', 'heading' + i);
            div_collapse_body.setAttribute('data-parent', '#accordion');
            div_card.appendChild(div_collapse_body);

            div_card_body = document.createElement('div');
            div_card_body.classList.add('card-body');
            div_collapse_body.appendChild(div_card_body);

            div_card_subbody = document.createElement('div');
            div_card_subbody.classList.add('card-body');
            div_card_subbody.classList.add('d-flex');
            div_card_subbody.classList.add('align-items-top');
            div_card_body.appendChild(div_card_subbody);

            div_inline_block = document.createElement('div');
            div_inline_block.classList.add('d-inline-block');
            div_card_subbody.appendChild(div_inline_block);

            img_thumbnail = document.createElement('img');
            img_thumbnail.classList.add('img-thumbnail');
            img_thumbnail.width = 150;
            img_thumbnail.height = 150;
            if (obj[i].photo) {
                img_thumbnail.src = '/img/photos/' + obj[i].photo;
            } else {
                img_thumbnail.src = '/img/150x150.jpg';
            }
            img_thumbnail.alt = obj[i].fullname;
            div_inline_block.appendChild(img_thumbnail);

            div_inline_subblock = document.createElement('div');
            div_inline_subblock.classList.add('d-inline-block');
            div_inline_subblock.classList.add('pl-3');
            div_inline_subblock.classList.add('w-100');
            div_card_subbody.appendChild(div_inline_subblock);

            h5_card_title = document.createElement('h5');
            h5_card_title.classList.add('card-title');
            h5_card_title.classList.add('mb-0');
            h5_card_title.innerText = obj[i].fullname;
            div_inline_subblock.appendChild(h5_card_title);

            p_one = document.createElement('p');
            p_one.classList.add('card-text');
            div_inline_subblock.appendChild(p_one);

            small = document.createElement('small');
            small.innerText = obj[i].company;
            p_one.appendChild(small);

            p_two = document.createElement('p');
            p_two.classList.add('card-text');
            p_two.classList.add('mb-0');
            div_inline_subblock.appendChild(p_two);

            span_p_two = document.createElement('span');
            span_p_two.classList.add('text-secondary');
            span_p_two.innerText = 'Телефон: ';
            p_two.appendChild(span_p_two);
            text_node_p_two = document.createTextNode(obj[i].phone);
            p_two.appendChild(text_node_p_two);

            p_three = document.createElement('p');
            p_three.classList.add('card-text');
            p_three.classList.add('mb-0');
            div_inline_subblock.appendChild(p_three);

            span_p_three = document.createElement('span');
            span_p_three.classList.add('text-secondary');
            span_p_three.innerText = 'Email: ';
            p_three.appendChild(span_p_three);
            text_node_p_three = document.createTextNode(obj[i].mail)
            p_three.appendChild(text_node_p_three);

            p_four = document.createElement('p');
            p_four.classList.add('card-text');
            p_four.classList.add('mb-0');
            div_inline_subblock.appendChild(p_four);

            span_p_four = document.createElement('span');
            span_p_four.classList.add('text-secondary');
            span_p_four.innerText = 'Дата рождения: ';
            p_four.appendChild(span_p_four);
            text_node_p_four = document.createTextNode(obj[i].birthdate)
            p_four.appendChild(text_node_p_four);

            btn_tools = document.createElement('button');
            btn_tools.id = obj[i].id;
            btn_tools.classList.add('tools');
            btn_tools.classList.add('btn');
            btn_tools.classList.add('btn-secondary');
            btn_tools.classList.add('float-right');
            div_inline_subblock.appendChild(btn_tools);

            img_tools = document.createElement('img');
            img_tools.width = 16;
            img_tools.height = 16;
            img_tools.src = '/img/tools.svg';
            btn_tools.appendChild(img_tools);

            btn_delete = document.createElement('button');
            btn_delete.id = obj[i].id;
            btn_delete.classList.add('delete');
            btn_delete.classList.add('btn');
            btn_delete.classList.add('btn-danger');
            btn_delete.classList.add('float-right');
            btn_delete.classList.add('mr-3');
            div_inline_subblock.appendChild(btn_delete);

            img_delete = document.createElement('img');
            img_delete.width = 16;
            img_delete.height = 16;
            img_delete.src = '/img/trash-fill.svg';
            btn_delete.appendChild(img_delete);
        }
        
        div_pagination = document.createElement('div');
        div_pagination.id = 'pagination';
        div_pagination.classList.add('mt-3');
        div_pagination.classList.add('btn-group');
        div_pagination.classList.add('btn-group-sm');
        div_pagination.role = 'group';
        div_pagination.setAttribute('aria-label', 'Notebook Pagination');
        if (count > this.MAX) {
            for (let i = 0; i < Math.ceil(count / this.MAX); i++) {
                btn_pagination = document.createElement('button');
                btn_pagination.setAttribute('type', 'button');
                btn_pagination.classList.add('pagination');
                btn_pagination.classList.add('btn');
                btn_pagination.classList.add('btn-outline-secondary');
                btn_pagination.classList.add('pl-3');
                btn_pagination.classList.add('pr-3');
                btn_pagination.innerText = (i + 1);
                div_pagination.appendChild(btn_pagination);
            }
        }

        this.root[0].innerText = '';
        this.root[0].appendChild(h6);
        this.root[0].appendChild(div_accordion);
        this.root[0].appendChild(div_pagination);        
    }

    pagination(count)
    {
        let buttons = '';
        if (count > this.MAX) {
            for (ind = 0; ind < Math.ceil(count / this.MAX); ind++) {
                buttons += '<button type="button" '
                        + 'class="pagination btn btn-outline-secondary pl-3 pr-3">'
                        + (ind + 1) + '</button>';
            }
            $("#pagination").html(buttons);
            $(".pagination").click(function(e){
                listObj(obj, e.currentTarget.innerText);
            });
        }
    }
}
