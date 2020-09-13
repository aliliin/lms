<?php


namespace App\SearchBuilders;


class ProductSearchBuilders
{
    protected $searchParameters = [
        'index' => 'products',
        'type' => '_doc',
        'body' => [
            'query' => [
                'bool' => [
                    'filter' => [],
                    'must' => [],
                ]
            ]
        ]
    ];

    /** 分页 */
    public function paginate($perPage, $page)
    {
        $this->searchParameters['body']['from'] = ($page - 1) * $perPage;
        $this->searchParameters['body']['size'] = $perPage;
        return $this;
    }

    /** 查询指定状态的商品 */
    public function onSale()
    {
        $this->searchParameters['body']['query']['bool']['filter'] = [
            [
                'term' => ['status' => true],
            ],
            [
                'term' => ['audit_status' => 1],
            ]
        ];
        return $this;
    }

    /** 关键词搜索 */
    public function onKeyWord($keyWords)
    {
        $keyWords = is_array($keyWords) ? $keyWords : [$keyWords];

        foreach ($keyWords as $keyWord) {
            $this->searchParameters['body']['query']['bool']['must'][] = [
                // 精确查询
                'multi_match' => [
                    'query' => $keyWord,
                    'fields' => [
                        'title', 'long_title'
                    ]
                ]
            ];
        }
        return $this;
    }

    /** 排序 */
    public function orderBy($field, $direction)
    {
        if (!isset($this->searchParameters['body']['sort'])) {
            $this->searchParameters['body']['sort'] = [];
        }
        $this->searchParameters['body']['sort'][] = [$field => $direction];
        return $this;
    }

    public function getParameter()
    {
        return $this->searchParameters;
    }
}
