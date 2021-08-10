// Test if mobile menu open and close as it should be

describe('Mobile Navigation Test', () => {
    it('Test if mobile menu opens and closes as it should be', () => {

        // Set viewport on iPhone 6
        // List of viewports: https://docs.cypress.io/api/commands/viewport.html#Arguments
        cy.viewport('iphone-6')

        // Run test on destination url
        cy.visit('localhost/crunch')

        // Find element which opens mobile navigation and click on it
        cy.get('.mburger').click()

        // Find element which closes mobile navigation and click on it
        cy.get('.mburger').click()
    })
})
