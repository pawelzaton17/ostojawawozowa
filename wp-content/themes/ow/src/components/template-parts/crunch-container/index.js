// const { __ } = wp.i18n;
import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/editor";

const blockStyle = {
    backgroundColor: "rgba(0,0,0, 0.2)",
    color: "#000",
    padding: "20px",
    border: "3px solid gray",
    margin: "20px 0",
};

const MY_CUSTOM_BLOCK_TEMPLATE = registerBlockType("crunch/block-example", {
    title: "Test block",
    icon: "universal-access-alt",
    category: "layout",
    edit: ({ className }) => {
        return (
            <div className={className} style={blockStyle}>
                <InnerBlocks
                    template={[
                        [
                            "core/columns",
                            { columns: 3 },
                            [
                                ["core/column", {}, [["core/paragraph"]]],
                                [
                                    "core/column",
                                    {},
                                    [
                                        [
                                            "core/paragraph",
                                            {
                                                placeholder: "Enter heading...",
                                                className: "is-style-custom-style",
                                            },
                                        ],
                                    ],
                                ],
                                ["core/column", {}, [["core/paragraph"]]],
                            ],
                        ],
                    ]}
                />
            </div>
        );
    },

    save: ({ className }) => {
        return (
            <div className={className} style={blockStyle}>
                <InnerBlocks.Content />
            </div>
        );
    },
});
